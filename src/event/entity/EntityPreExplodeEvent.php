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

namespace pocketmine\event\entity;

use pocketmine\entity\Entity;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;

/**
 * Called when an entity decides to explode, before the explosion's impact is calculated.
 * This allows changing the force of the explosion and whether it will destroy blocks.
 *
 * @see EntityExplodeEvent
 *
 * @phpstan-extends EntityEvent<Entity>
 */
class EntityPreExplodeEvent extends EntityEvent implements Cancellable{
	use CancellableTrait;

	private bool $blockBreaking = true;

	public function __construct(
		Entity $entity,
		protected float $radius
	){
		if($radius <= 0){
			throw new \InvalidArgumentException("Explosion radius must be positive");
		}
		$this->entity = $entity;
	}

	public function getRadius() : float{
		return $this->radius;
	}

	public function setRadius(float $radius) : void{
		if($radius <= 0){
			throw new \InvalidArgumentException("Explosion radius must be positive");
		}
		$this->radius = $radius;
	}

	public function isBlockBreaking() : bool{
		return $this->blockBreaking;
	}

	public function setBlockBreaking(bool $affectsBlocks) : void{
		$this->blockBreaking = $affectsBlocks;
	}
}
