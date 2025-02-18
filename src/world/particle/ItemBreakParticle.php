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

namespace pocketmine\world\particle;

use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\convert\TypeConverter;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\types\ParticleIds;

class ItemBreakParticle implements Particle{
	public function __construct(private Item $item){}

	public function encode(Vector3 $pos) : array{
		[$id, $meta] = TypeConverter::getInstance()->getItemTranslator()->toNetworkId($this->item);
		return [LevelEventPacket::standardParticle(ParticleIds::ITEM_BREAK, ($id << 16) | $meta, $pos)];
	}
}
