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

namespace pocketmine\world\utils;

final class SubChunkExplorerStatus{
	private function __construct(){
		//NOOP
	}

	/** We encountered terrain not accessible by the current terrain provider */
	public const INVALID = 0;
	/** We remained inside the same (sub)chunk */
	public const OK = 1;
	/** We moved to a different (sub)chunk */
	public const MOVED = 2;
}
