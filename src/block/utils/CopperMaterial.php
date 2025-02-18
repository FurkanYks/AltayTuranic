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

/**
 * Represents copper blocks that have oxidized and waxed variations.
 */
interface CopperMaterial{

	public function getOxidation() : CopperOxidation;

	public function setOxidation(CopperOxidation $oxidation) : CopperMaterial;

	public function isWaxed() : bool;

	public function setWaxed(bool $waxed) : CopperMaterial;
}
