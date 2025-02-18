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

use pocketmine\block\utils\ColoredTrait;
use pocketmine\block\utils\DyeColor;

class CakeWithDyedCandle extends CakeWithCandle{
	use ColoredTrait;

	public function __construct(BlockIdentifier $idInfo, string $name, BlockTypeInfo $typeInfo){
		$this->color = DyeColor::WHITE;
		parent::__construct($idInfo, $name, $typeInfo);
	}

	public function getCandle() : Candle{
		return VanillaBlocks::DYED_CANDLE()->setColor($this->color);
	}
}
