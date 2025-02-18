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

namespace pocketmine\entity;

/**
 * Interface implemented by objects that can be consumed by players, giving them food and saturation.
 */
interface FoodSource extends Consumable{

	public function getFoodRestore() : int;

	public function getSaturationRestore() : float;

	/**
	 * Returns whether a Human eating this FoodSource must have a non-full hunger bar.
	 * This is ignored in creative mode and in peaceful difficulty.
	 */
	public function requiresHunger() : bool;
}
