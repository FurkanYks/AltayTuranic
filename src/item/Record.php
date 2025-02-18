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

use pocketmine\block\utils\RecordType;

class Record extends Item{
	private RecordType $recordType;

	//TODO: inconsistent parameter order
	public function __construct(ItemIdentifier $identifier, RecordType $recordType, string $name){
		$this->recordType = $recordType;
		parent::__construct($identifier, $name);
	}

	public function getRecordType() : RecordType{
		return $this->recordType;
	}

	public function getMaxStackSize() : int{
		return 1;
	}
}
