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

namespace pocketmine\utils;

/**
 * @phpstan-template TPriority of numeric
 * @phpstan-template TValue
 * @phpstan-extends \SplPriorityQueue<TPriority, TValue>
 */
class ReversePriorityQueue extends \SplPriorityQueue{

	/**
	 * @param mixed $priority1
	 * @param mixed $priority2
	 * @phpstan-param TPriority $priority1
	 * @phpstan-param TPriority $priority2
	 *
	 * @return int
	 */
	#[\ReturnTypeWillChange]
	public function compare($priority1, $priority2){
		//TODO: this will crash if non-numeric priorities are used
		return (int) -($priority1 - $priority2);
	}
}
