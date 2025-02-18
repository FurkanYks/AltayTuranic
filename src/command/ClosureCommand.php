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

namespace pocketmine\command;

use pocketmine\lang\Translatable;
use pocketmine\utils\Utils;

/**
 * @phpstan-type Execute \Closure(CommandSender $sender, Command $command, string $commandLabel, list<string> $args) : mixed
 */
final class ClosureCommand extends Command{
	/** @phpstan-var Execute */
	private \Closure $execute;

	/**
	 * @param string[] $permissions
	 * @phpstan-param Execute $execute
	 */
	public function __construct(
		string $name,
		\Closure $execute,
		array $permissions,
		Translatable|string $description = "",
		Translatable|string|null $usageMessage = null,
		array $aliases = []
	){
		Utils::validateCallableSignature(
			fn(CommandSender $sender, Command $command, string $commandLabel, array $args) : mixed => 1,
			$execute,
		);
		$this->execute = $execute;
		parent::__construct($name, $description, $usageMessage, $aliases);
		$this->setPermissions($permissions);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		return ($this->execute)($sender, $this, $commandLabel, $args);
	}
}
