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

namespace pocketmine\block;

use pocketmine\block\tile\Beacon as BeaconTile;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

final class Beacon extends Transparent{

	public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null) : bool{
		return $face !== Facing::DOWN && parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
	}

	public function getBeaconTile() : ?BeaconTile{
		$tile = $this->position->getWorld()->getTileAt($this->position->x, $this->position->y, $this->position->z);
		return $tile instanceof BeaconTile ? $tile : null;
	}


	public function onInteract(Item $item, int $face, Vector3 $clickVector, ?Player $player = null, array &$returnedItems = []) : bool{
		if($player instanceof Player){
			$tile = $this->getBeaconTile();
			if($tile instanceof BeaconTile){
				return $player->setCurrentWindow($tile->getInventory());
			}
		}
		return parent::onInteract($item, $face, $clickVector, $player);
	}

	public function onScheduledUpdate() : void{
		$tile = $this->getBeaconTile();
		if($tile instanceof BeaconTile){
			$tile->onBeaconUpdate(30); #1.5saniye
		}
	}
	public function getLightLevel() : int{
		return 15;
	}
}
