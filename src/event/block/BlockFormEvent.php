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

namespace pocketmine\event\block;

use pocketmine\block\Block;

/**
 * Called when a new block forms, usually as the result of some action.
 * This could be things like obsidian forming due to collision of lava and water.
 */
class BlockFormEvent extends BaseBlockChangeEvent{

	public function __construct(
		Block $block,
		Block $newState,
		private Block $causingBlock
	){
		parent::__construct($block, $newState);
	}

	/**
	 * Returns the block which caused the target block to form into a new state.
	 */
	public function getCausingBlock() : Block{
		return $this->causingBlock;
	}
}
