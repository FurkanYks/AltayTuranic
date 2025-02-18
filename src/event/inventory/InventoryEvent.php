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

/**
 * Inventory related events
 */
namespace pocketmine\event\inventory;

use pocketmine\event\Event;
use pocketmine\inventory\Inventory;
use pocketmine\player\Player;

abstract class InventoryEvent extends Event{
	public function __construct(
		protected Inventory $inventory
	){}

	public function getInventory() : Inventory{
		return $this->inventory;
	}

	/**
	 * @return Player[]
	 */
	public function getViewers() : array{
		return $this->inventory->getViewers();
	}
}
