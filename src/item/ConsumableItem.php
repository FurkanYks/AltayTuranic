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

namespace pocketmine\item;

use pocketmine\entity\Consumable;

/**
 * Interface implemented by objects that can be consumed by mobs.
 */
interface ConsumableItem extends Consumable, Releasable{

	/**
	 * Returns the leftover that this Consumable produces when it is consumed. For Items, this is usually air, but could
	 * be an Item to add to a Player's inventory afterwards (such as a bowl).
	 */
	public function getResidue() : Item;
}
