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

namespace pocketmine\command\defaults;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\KnownTranslationFactory;
use pocketmine\permission\DefaultPermissionNames;

class SaveOnCommand extends VanillaCommand{

	public function __construct(){
		parent::__construct(
			"save-on",
			KnownTranslationFactory::pocketmine_command_saveon_description()
		);
		$this->setPermission(DefaultPermissionNames::COMMAND_SAVE_ENABLE);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		$sender->getServer()->getWorldManager()->setAutoSave(true);

		Command::broadcastCommandMessage($sender, KnownTranslationFactory::commands_save_enabled());

		return true;
	}
}
