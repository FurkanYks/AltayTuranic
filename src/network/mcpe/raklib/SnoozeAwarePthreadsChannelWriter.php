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

namespace pocketmine\network\mcpe\raklib;

use pmmp\thread\ThreadSafeArray;
use pocketmine\snooze\SleeperNotifier;
use raklib\server\ipc\InterThreadChannelWriter;

final class SnoozeAwarePthreadsChannelWriter implements InterThreadChannelWriter{
	/**
	 * @phpstan-param ThreadSafeArray<int, string> $buffer
	 */
	public function __construct(
		private ThreadSafeArray $buffer,
		private SleeperNotifier $notifier
	){}

	public function write(string $str) : void{
		$this->buffer[] = $str;
		$this->notifier->wakeupSleeper();
	}
}
