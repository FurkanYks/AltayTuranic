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

namespace pocketmine\entity\animation;

use pocketmine\entity\Living;
use pocketmine\item\Item;
use pocketmine\network\mcpe\convert\TypeConverter;
use pocketmine\network\mcpe\protocol\ActorEventPacket;
use pocketmine\network\mcpe\protocol\types\ActorEvent;

final class ConsumingItemAnimation implements Animation{

	public function __construct(
		private Living $entity,
		private Item $item
	){}

	public function encode() : array{
		[$netId, $netData] = TypeConverter::getInstance()->getItemTranslator()->toNetworkId($this->item);
		return [
			//TODO: need to check the data values
			ActorEventPacket::create($this->entity->getId(), ActorEvent::EATING_ITEM, ($netId << 16) | $netData)
		];
	}
}
