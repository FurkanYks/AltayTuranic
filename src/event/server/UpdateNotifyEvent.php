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

namespace pocketmine\event\server;

use pocketmine\updater\UpdateChecker;

/**
 * Called when the update checker receives notification of an available PocketMine-MP update.
 * Plugins may use this event to perform actions when an update notification is received.
 */
class UpdateNotifyEvent extends ServerEvent{
	public function __construct(private UpdateChecker $updater){}

	public function getUpdater() : UpdateChecker{
		return $this->updater;
	}
}
