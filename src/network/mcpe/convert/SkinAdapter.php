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

namespace pocketmine\network\mcpe\convert;

use pocketmine\entity\InvalidSkinException;
use pocketmine\entity\Skin;
use pocketmine\network\mcpe\protocol\types\skin\SkinData;

/**
 * Used to convert new skin data to the skin entity or old skin entity to skin data.
 */
interface SkinAdapter{

	/**
	 * Allows you to convert a skin entity to skin data.
	 */
	public function toSkinData(Skin $skin) : SkinData;

	/**
	 * Allows you to convert skin data to a skin entity.
	 * @throws InvalidSkinException
	 */
	public function fromSkinData(SkinData $data) : Skin;
}
