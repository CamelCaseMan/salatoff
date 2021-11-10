<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(CuponSeeder::class);
        $this->call(ReviewSeeder::class);
        \App\Models\Blog::factory(55)->create();
        \App\Models\RecipeСategories::factory(10)->create();
        \App\Models\Recipes::factory(100)->create();
    }
}
