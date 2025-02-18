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

namespace pocketmine\inventory\json;

use pocketmine\crafting\json\ItemStackData;

final class CreativeGroupData{
	/** @required */
	public string $group_name;
	/** @required */
	public ?ItemStackData $group_icon;
	/**
	 * @var \pocketmine\crafting\json\ItemStackData[]
	 * @required
	 */
	public array $items;
}
