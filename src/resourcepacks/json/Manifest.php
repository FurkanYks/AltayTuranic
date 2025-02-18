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

namespace pocketmine\resourcepacks\json;

/**
 * Model for JsonMapper to represent resource pack manifest.json contents.
 */
final class Manifest{
	/** @required */
	public int $format_version;

	/** @required */
	public ManifestHeader $header;

	/**
	 * @var ManifestModuleEntry[]
	 * @required
	 */
	public array $modules;

	public ?ManifestMetadata $metadata = null;

	/** @var string[] */
	public ?array $capabilities = null;

	/** @var ManifestDependencyEntry[] */
	public ?array $dependencies = null;
}
