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

namespace pocketmine\event\world;

use pocketmine\world\World;

/**
 * Called when a world's difficulty is changed.
 */
final class WorldDifficultyChangeEvent extends WorldEvent{

	public function __construct(
		World $world,
		private int $oldDifficulty,
		private int $newDifficulty
	){
		parent::__construct($world);
	}

	public function getOldDifficulty() : int{ return $this->oldDifficulty; }

	public function getNewDifficulty() : int{ return $this->newDifficulty; }
}
