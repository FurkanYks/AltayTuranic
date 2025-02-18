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

namespace pocketmine\crafting;

use pocketmine\item\Item;

class FurnaceRecipe{

	public function __construct(
		private Item $result,
		private RecipeIngredient $ingredient
	){
		$this->result = clone $result;
	}

	public function getInput() : RecipeIngredient{
		return $this->ingredient;
	}

	public function getResult() : Item{
		return clone $this->result;
	}
}
