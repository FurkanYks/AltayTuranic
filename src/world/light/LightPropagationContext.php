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

namespace pocketmine\world\light;

final class LightPropagationContext{

	/** @phpstan-var \SplQueue<array{int, int, int}> */
	public \SplQueue $spreadQueue;
	/**
	 * @var int[]|true[]
	 * @phpstan-var array<int, int|true>
	 */
	public array $spreadVisited = [];

	/** @phpstan-var \SplQueue<array{int, int, int, int}> */
	public \SplQueue $removalQueue;
	/**
	 * @var true[]
	 * @phpstan-var array<int, true>
	 */
	public array $removalVisited = [];

	public function __construct(){
		$this->removalQueue = new \SplQueue();
		$this->spreadQueue = new \SplQueue();
	}
}
