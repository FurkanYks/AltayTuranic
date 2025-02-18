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

namespace pocketmine\plugin;

/**
 * @internal
 */
final class PluginLoadTriageEntry{

	public function __construct(
		private string $file,
		private PluginLoader $loader,
		private PluginDescription $description
	){}

	public function getFile() : string{ return $this->file; }

	public function getLoader() : PluginLoader{ return $this->loader; }

	public function getDescription() : PluginDescription{ return $this->description; }
}
