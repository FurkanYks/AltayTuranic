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

namespace pocketmine\data\bedrock\block\upgrade;

use pocketmine\data\bedrock\LegacyToStringIdMap;
use pocketmine\utils\SingletonTrait;
use Symfony\Component\Filesystem\Path;

final class LegacyBlockIdToStringIdMap extends LegacyToStringIdMap{
	use SingletonTrait;

	public function __construct(){
		parent::__construct(Path::join(\pocketmine\BEDROCK_BLOCK_UPGRADE_SCHEMA_PATH, 'block_legacy_id_map.json'));
	}
}
