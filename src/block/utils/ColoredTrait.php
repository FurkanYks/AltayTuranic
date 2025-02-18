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

use pocketmine\block\Block;
use pocketmine\data\runtime\RuntimeDataDescriber;

trait ColoredTrait{
	/** @var DyeColor */
	private $color = DyeColor::WHITE;

	/** @see Block::describeBlockItemState() */
	public function describeBlockItemState(RuntimeDataDescriber $w) : void{
		$w->enum($this->color);
	}

	public function getColor() : DyeColor{ return $this->color; }

	/** @return $this */
	public function setColor(DyeColor $color) : self{
		$this->color = $color;
		return $this;
	}
}
