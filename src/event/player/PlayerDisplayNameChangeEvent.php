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

namespace pocketmine\event\player;

use pocketmine\player\Player;

class PlayerDisplayNameChangeEvent extends PlayerEvent{

	public function __construct(
		Player $player,
		private string $oldName,
		private string $newName
	){
		$this->player = $player;
	}

	public function getOldName() : string{
		return $this->oldName;
	}

	public function getNewName() : string{
		return $this->newName;
	}
}
