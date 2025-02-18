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

namespace pocketmine\crafting\json;

final class SmithingTransformRecipeData{

	/** @required */
	public RecipeIngredientData $template;
	/** @required */
	public RecipeIngredientData $input;
	/** @required */
	public RecipeIngredientData $addition;
	/** @required */
	public ItemStackData $output;
	/** @required */
	public string $block;

	public function __construct(RecipeIngredientData $template, RecipeIngredientData $input, RecipeIngredientData $addition, ItemStackData $output, string $block){
		$this->template = $template;
		$this->input = $input;
		$this->addition = $addition;
		$this->output = $output;
		$this->block = $block;
	}
}
