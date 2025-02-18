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

namespace pocketmine\block;

use pocketmine\item\Item;

final class InfestedStone extends Opaque{

	private int $imitated;

	public function __construct(BlockIdentifier $idInfo, string $name, BlockTypeInfo $typeInfo, Block $imitated){
		parent::__construct($idInfo, $name, $typeInfo);
		$this->imitated = $imitated->getStateId();
	}

	public function getImitatedBlock() : Block{
		return RuntimeBlockStateRegistry::getInstance()->fromStateId($this->imitated);
	}

	public function getDropsForCompatibleTool(Item $item) : array{
		return [];
	}

	public function getSilkTouchDrops(Item $item) : array{
		return [$this->getImitatedBlock()->asItem()];
	}

	public function isAffectedBySilkTouch() : bool{
		return true;
	}

	//TODO
}
