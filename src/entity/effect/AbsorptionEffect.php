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

namespace pocketmine\entity\effect;

use pocketmine\entity\Living;

class AbsorptionEffect extends Effect{

	public function add(Living $entity, EffectInstance $instance) : void{
		$new = (4 * $instance->getEffectLevel());
		if($new > $entity->getAbsorption()){
			$entity->setAbsorption($new);
		}
	}

	public function remove(Living $entity, EffectInstance $instance) : void{
		$entity->setAbsorption(0);
	}
}
