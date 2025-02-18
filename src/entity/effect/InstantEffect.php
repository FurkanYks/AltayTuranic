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

use pocketmine\color\Color;
use pocketmine\lang\Translatable;

abstract class InstantEffect extends Effect{

	public function __construct(Translatable|string $name, Color $color, bool $bad = false, bool $hasBubbles = true){
		parent::__construct($name, $color, $bad, 1, $hasBubbles);
	}

	public function canTick(EffectInstance $instance) : bool{
		return true; //If forced to last longer than 1 tick, these apply every tick.
	}
}
