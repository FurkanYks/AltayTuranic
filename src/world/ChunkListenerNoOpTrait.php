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

namespace pocketmine\world;

use pocketmine\math\Vector3;
use pocketmine\world\format\Chunk;

/**
 * This trait implements no-op default methods for chunk listeners.
 * @see ChunkListener
 */
trait ChunkListenerNoOpTrait/* implements ChunkListener*/{

	public function onChunkChanged(int $chunkX, int $chunkZ, Chunk $chunk) : void{
		//NOOP
	}

	public function onChunkLoaded(int $chunkX, int $chunkZ, Chunk $chunk) : void{
		//NOOP
	}

	public function onChunkUnloaded(int $chunkX, int $chunkZ, Chunk $chunk) : void{
		//NOOP
	}

	public function onChunkPopulated(int $chunkX, int $chunkZ, Chunk $chunk) : void{
		//NOOP
	}

	public function onBlockChanged(Vector3 $block) : void{
		//NOOP
	}
}
