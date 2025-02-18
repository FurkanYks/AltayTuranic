<?php

/*
 *               _ _
 *         /\   | | |
 *        /  \  | | |_ __ _ _   _
 *       / /\ \ | | __/ _` | | | |
 *      / ____ \| | || (_| | |_| |
 *     /_/    \_|_|\__\__,_|\__, |
 *                           __/ |
 *                          |___/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author TuranicTeam - FurkanYks
 * @link https://github.com/TuranicTeam/Altay
 *
 */

declare(strict_types=1);

namespace pocketmine\block\tile;

use pocketmine\block\inventory\BeaconInventory;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\player\Player;
use pocketmine\world\World;

final class Beacon extends Spawnable {

	private const TAG_PRIMARY = "primary";
	private const TAG_SECONDARY = "secondary";
	private const TAG_LAYER = "layer";
	private const TAG_WORLD = "world";

	private int $primaryEffect = 0;
	private int $secondaryEffect = 0;
	private int $layerLevel = 0;
	private string $beaconWorld = "world";

	public BeaconInventory $inventory;

	public function __construct(World $world, Vector3 $pos) {
		parent::__construct($world, $pos);
		$this->inventory = new BeaconInventory($this->position);
	}

	public function getInventory() : BeaconInventory {
		return $this->inventory;
	}

	protected function addAdditionalSpawnData(CompoundTag $nbt) : void {
		$nbt->setInt(self::TAG_PRIMARY, $this->primaryEffect);
		$nbt->setInt(self::TAG_SECONDARY, $this->secondaryEffect);
		$nbt->setInt(self::TAG_LAYER, $this->layerLevel);
		$nbt->setString(self::TAG_WORLD, $this->beaconWorld);
	}

	public function readSaveData(CompoundTag $nbt) : void {
		$this->primaryEffect = $nbt->getInt(self::TAG_PRIMARY, 0);
		$this->secondaryEffect = $nbt->getInt(self::TAG_SECONDARY, 0);
		$this->layerLevel = $nbt->getInt(self::TAG_LAYER, 0);
		$this->beaconWorld = $nbt->getString(self::TAG_WORLD, "world");
	}

	protected function writeSaveData(CompoundTag $nbt) : void {
		$nbt->setInt(self::TAG_PRIMARY, $this->primaryEffect);
		$nbt->setInt(self::TAG_SECONDARY, $this->secondaryEffect);
		$nbt->setInt(self::TAG_LAYER, $this->layerLevel);
		$nbt->setString(self::TAG_WORLD, $this->beaconWorld);
	}

	public function onBeaconPayment(): void { // returns a call, when stack request success, and payment is succesfull for beacon.
		$level = $this->getTotalPyramidSize();
		$this->setLayerLevel($level);
		$this->setBeaconWorld($this->getPosition()->getWorld()->getFolderName());
	}

	public function getPrimaryEffect() : int {
		return $this->primaryEffect;
	}

	public function setPrimaryEffect(int $primaryEffect) : void {
		$this->primaryEffect = $primaryEffect;
	}

	public function getLayerLevel() : int {
		return $this->layerLevel;
	}

	public function setLayerLevel(int $layerLevel) : void {
		$this->layerLevel = $layerLevel;
	}

	public function getBeaconWorld() : string {
		return $this->beaconWorld;
	}

	public function setBeaconWorld(string $beaconWorld) : void {
		$this->beaconWorld = $beaconWorld;
	}

	public function getSecondaryEffect() : int {
		return $this->secondaryEffect;
	}

	public function setSecondaryEffect(int $secondaryEffect) : void {
		$this->secondaryEffect = $secondaryEffect;
	}

	public function onBeaconUpdate(int $tick): void {
		$this->getPosition()->getWorld()->scheduleDelayedBlockUpdate($this->position->asVector3(), $tick);
		foreach ($this->getPosition()->getWorld()->getServer()->getOnlinePlayers() as $player) {
			if ($this->getBeaconWorld() === $player->getWorld()->getFolderName()) {
				if ($player->getPosition()->distance($this->getPosition()) < $this->getBlockRange()) {
					$this->addEffects($player);
				}
			}
		}
		if ($this->getLayerLevel() !== $this->getTotalPyramidSize()) {
			$this->setPrimaryEffect(0);
			$this->setSecondaryEffect(0);
		}
	}

	public function addEffects(Player $player): void {
		$duration = $this->getEffectDuration() * 20;

		// Primary efektler (varsayılan amplifier: 0)
		$primaryEffects = [
			1 => VanillaEffects::SPEED(),
			3 => VanillaEffects::HASTE(),
			11 => VanillaEffects::RESISTANCE(),
			8 => VanillaEffects::JUMP_BOOST(),
			5 => VanillaEffects::STRENGTH(),
		];

		if (isset($primaryEffects[$this->primaryEffect])) {
			$player->getEffects()->add(new EffectInstance($primaryEffects[$this->primaryEffect], $duration));
		}

		// Secondary efekt: Eğer 10 yani(REGENERATION) efekti kullanılıyor ise amplifier kullanılmıyor, (VANILLADAKI GIBI)
		// diğerlerinde amplifier değeri 1 olarak ekleniyor.
		if ($this->secondaryEffect === 10) {
			$player->getEffects()->add(new EffectInstance(VanillaEffects::REGENERATION(), $duration));
		} elseif (in_array($this->secondaryEffect, [1, 3, 11, 8, 5], true)) {
			$secondaryEffects = [
				1 => VanillaEffects::SPEED(),
				3 => VanillaEffects::HASTE(),
				11 => VanillaEffects::RESISTANCE(),
				8 => VanillaEffects::JUMP_BOOST(),
				5 => VanillaEffects::STRENGTH(),
			];
			$player->getEffects()->add(new EffectInstance($secondaryEffects[$this->secondaryEffect], $duration, 1));
		}
	}

	public function getTotalPyramidSize() : int {
		$levels = 0;
		// 1'den 4'e kadar olan katmanlar kontrol ediliyor;
		// ilk başarısızlıkta döngüden çıkılıyor. örneğin herhangi bir blok daha sonradan yok olursa.
		for ($i = 1; $i <= 4; $i++) {
			if ($this->checkPyramidLevel($i)) {
				$levels = $i;
			} else {
				break;
			}
		}
		return $levels;
	}

	public function getBlockRange() : int {
		return match ($this->getTotalPyramidSize()) {
			1 => 20,
			2 => 30,
			3 => 40,
			4 => 50,
			default => 0,
		};
	}

	public function getEffectDuration() : int {
		return match ($this->getTotalPyramidSize()) {
			1 => 11,
			2 => 13,
			3 => 15,
			4 => 17,
			default => 0,
		};
	}

	public function isSupportedBlock(int $x, int $y, int $z): bool {
		$blockName = $this->position->getWorld()->getBlockAt($x, $y, $z)->getName();
		return $this->isSupportedBlockType($blockName);
	}

	public function isSupportedBlockType(string $blockName): bool {
		return in_array($blockName, [
			"Iron Block",
			"Gold Block",
			"Emerald Block",
			"Diamond Block",
			"Netherite Block"
		], true);
	}

	/**
	 * Belirtilen katman için (ör. 1 → 3x3, 2 → 5x5, vs.) tüm blokların destekli olup olmadığını kontrol eder.
	 *
	 * @param int $level Katman numarası - Pyramid layer level
	 * @return bool
	 */
	private function checkPyramidLevel(int $level): bool {
		$originX = $this->position->getFloorX();
		$originY = $this->position->getFloorY() - $level;
		$originZ = $this->position->getFloorZ();
		for ($x = -$level; $x <= $level; $x++) {
			for ($z = -$level; $z <= $level; $z++) {
				if (!$this->isSupportedBlock($originX + $x, $originY, $originZ + $z)) {
					return false;
				}
			}
		}
		return true;
	}
}