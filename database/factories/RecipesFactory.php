<?php

namespace Database\Factories;

use App\Models\Recipes;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipes::class;

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
            'category_id' => rand(1,9),
            'text' => $this->faker->text(900)
        ];
    }
}
