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

namespace pocketmine;

use pocketmine\snooze\SleeperHandler;
use pocketmine\snooze\SleeperHandlerEntry;
use pocketmine\timings\TimingsHandler;
use pocketmine\utils\Utils;
use function hrtime;

/**
 * Custom Snooze sleeper handler which captures notification processing time.
 * @internal
 */
final class TimeTrackingSleeperHandler extends SleeperHandler{

	private int $notificationProcessingTimeNs = 0;

	/**
	 * @var TimingsHandler[]
	 * @phpstan-var array<string, TimingsHandler>
	 */
	private static array $handlerTimings = [];

	public function __construct(
		private TimingsHandler $timings
	){
		parent::__construct();
	}

	public function addNotifier(\Closure $handler) : SleeperHandlerEntry{
		$name = Utils::getNiceClosureName($handler);
		$timings = self::$handlerTimings[$name] ??= new TimingsHandler("Snooze Handler: " . $name, $this->timings);

		return parent::addNotifier(function() use ($timings, $handler) : void{
			$timings->startTiming();
			$handler();
			$timings->stopTiming();
		});
	}

	/**
	 * Returns the time in nanoseconds spent processing notifications since the last reset.
	 */
	public function getNotificationProcessingTime() : int{ return $this->notificationProcessingTimeNs; }

	/**
	 * Resets the notification processing time tracker to zero.
	 */
	public function resetNotificationProcessingTime() : void{ $this->notificationProcessingTimeNs = 0; }

	public function processNotifications() : void{
		$startTime = hrtime(true);
		$this->timings->startTiming();
		try{
			parent::processNotifications();
		}finally{
			$this->notificationProcessingTimeNs += hrtime(true) - $startTime;
			$this->timings->stopTiming();
		}
	}
}
