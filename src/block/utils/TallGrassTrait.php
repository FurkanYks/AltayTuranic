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

namespace pocketmine\block\utils;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;

/**
 * @internal
 */
trait TallGrassTrait{
	public function canBeReplaced() : bool{
		return true;
	}

	public function getDropsForIncompatibleTool(Item $item) : array{
		if(FortuneDropHelper::bonusChanceDivisor($item, 8, 2)){
			return [
				VanillaItems::WHEAT_SEEDS()
			];
		}

		return [];
	}

	public function getFlameEncouragement() : int{
		return 60;
	}

	public function getFlammability() : int{
		return 100;
	}
}
