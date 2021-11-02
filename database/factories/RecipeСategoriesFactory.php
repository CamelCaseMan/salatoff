<?php

namespace Database\Factories;

use App\Models\RecipeСategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeСategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeСategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);

        return [
            'title' => $title,
            'slug' => \Str::of($title)->slug('-')->snake(),
        ];
    }
}
