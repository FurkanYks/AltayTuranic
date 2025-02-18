<?php

declare(strict_types=1);

namespace pocketmine\block\inventory;

use pocketmine\block\tile\Tile;
use pocketmine\inventory\SimpleInventory;
use pocketmine\inventory\TemporaryInventory;
use pocketmine\item\Item;
use pocketmine\world\Position;
use pocketmine\block\Block;

class BeaconInventory extends SimpleInventory implements BlockInventory, TemporaryInventory {

	public const SLOT_FUEL = 0;

	private Position $holder;

	public function __construct(Position $holder){
		parent::__construct(1);
		$this->holder = $holder;
	}

	public function getFuelItem() : Item{
		return $this->getItem(self::SLOT_FUEL);
	}

	public function setFuelItem(Item $item) : void{
		$this->setItem(self::SLOT_FUEL, $item);
	}

	public function getHolder() : Position{
		return $this->holder;
	}

	public function getBlockAtPosition() : Block{
		return $this->holder->getWorld()->getBlockAt($this->holder->x, $this->holder->y, $this->holder->z);
	}
	public function getBlockTileAtPosition() : Tile{
		return $this->holder->getWorld()->getTileAt($this->holder->x, $this->holder->y, $this->holder->z);
	}
}