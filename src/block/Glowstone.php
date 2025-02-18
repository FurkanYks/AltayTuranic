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

use pocketmine\block\utils\FortuneDropHelper;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use function min;

class Glowstone extends Transparent{

	public function getLightLevel() : int{
		return 15;
	}

	public function getDropsForCompatibleTool(Item $item) : array{
		return [
			VanillaItems::GLOWSTONE_DUST()->setCount(min(4, FortuneDropHelper::discrete($item, 2, 4)))
		];
	}

	public function isAffectedBySilkTouch() : bool{
		return true;
	}
}
