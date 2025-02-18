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

use pocketmine\entity\Entity;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class NameTag extends Item{

	public function onInteractEntity(Player $player, Entity $entity, Vector3 $clickVector) : bool{
		if($entity->canBeRenamed() && $this->hasCustomName()){
			$entity->setNameTag($this->getCustomName());
			$this->pop();
			return true;
		}
		return false;
	}
}
