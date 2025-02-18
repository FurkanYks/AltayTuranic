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

/**
 * Entity related Events, like spawn, inventory, attack...
 */
namespace pocketmine\event\entity;

use pocketmine\entity\Entity;
use pocketmine\event\Event;

/**
 * @phpstan-template TEntity of Entity
 */
abstract class EntityEvent extends Event{
	/** @phpstan-var TEntity */
	protected Entity $entity;

	/**
	 * @return Entity
	 * @phpstan-return TEntity
	 */
	public function getEntity(){
		return $this->entity;
	}
}
