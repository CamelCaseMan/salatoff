<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeСategories extends Model
{
    use HasFactory;

    /**
     * Получаем рецепты категории
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipes::class, 'category_id');
    }
}
