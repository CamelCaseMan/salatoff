<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Recipes;
use App\Models\RecipeСategories;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function getCategoryRecipes()
    {
        $category = RecipeСategories::get();
        return view('front.recipes.category', compact('category'));
    }

    public function getListRecipes(string $category_slug)
    {
        $list = RecipeСategories::where('slug', $category_slug)
            ->with('getRecipes')
            ->firstOrFail();
        return view('front.recipes.list', compact('list'));
    }

    public function getRecipe(string $category_slug, string $recipe_slug)
    {
        $category = RecipeСategories::where('slug', $category_slug)
            ->firstOrFail();

        $recipe = Recipes::where('slug', $recipe_slug)
            ->where('category_id', $category->id)
            ->firstOrFail();
        return view('front.recipes.recipe', compact('recipe','category'));
    }
}
