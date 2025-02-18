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

use pocketmine\block\Block;
use pocketmine\block\BlockToolType;

class Shears extends Tool{

	public function getMaxDurability() : int{
		return 239;
	}

	public function getBlockToolType() : int{
		return BlockToolType::SHEARS;
	}

	public function getBlockToolHarvestLevel() : int{
		return 1;
	}

	protected function getBaseMiningEfficiency() : float{
		return 15;
	}

	public function onDestroyBlock(Block $block, array &$returnedItems) : bool{
		return $this->applyDamage(1);
	}
}
