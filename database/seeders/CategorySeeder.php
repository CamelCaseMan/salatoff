<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            0 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 0,
                'show' => 1,
            ],

            1 => [
                'name' => 'Фасовые',
                'slug' => \Str::of('Фасовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 0,
                'show' => 1,
            ],

            2 => [
                'name' => 'Традиционные салаты',
                'slug' => \Str::of('Традиционные салаты')->slug('-')->snake(),
                'image' => '1.jpg',
                'parent_id' => 1,
                'show' => 1,
            ],

            3 => [
                'name' => 'Традиционные салаты',
                'slug' => \Str::of('Традиционные салаты')->slug('-')->snake(),
                'image' => '1.jpg',
                'parent_id' => 2,
                'show' => 1,
            ],

            4 => [
                'name' => 'Корейские салаты',
                'slug' => \Str::of('Корейские салаты')->slug('-')->snake(),
                'image' => '2.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            5 => [
                'name' => 'Корейские салаты',
                'slug' => \Str::of('Корейские салаты')->slug('-')->snake(),
                'image' => '2.png',
                'parent_id' => 2,
                'show' => 1,
            ],


            6 => [
                'name' => 'Готовая кулинария',
                'slug' => \Str::of('Готовая кулинария')->slug('-')->snake(),
                'image' => '3.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            7 => [
                'name' => 'Готовая кулинария',
                'slug' => \Str::of('Готовая кулинария')->slug('-')->snake(),
                'image' => '3.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            8 => [
                'name' => 'Комплесные обеды',
                'slug' => \Str::of('Комплесные обеды')->slug('-')->snake(),
                'image' => '4.jpg',
                'parent_id' => 1,
                'show' => 1,
            ],

            9 => [
                'name' => 'Комплесные обеды',
                'slug' => \Str::of('Комплесные обеды')->slug('-')->snake(),
                'image' => '4.jpg',
                'parent_id' => 2,
                'show' => 1,
            ],

            10 => [
                'name' => 'Бутерброды и сэндвичи',
                'slug' => \Str::of('Бутерброды и сэндвичи')->slug('-')->snake(),
                'image' => '5.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            11 => [
                'name' => 'Бутерброды и сэндвичи',
                'slug' => \Str::of('Бутерброды и сэндвичи')->slug('-')->snake(),
                'image' => '5.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            12 => [
                'name' => 'Роллы',
                'slug' => \Str::of('Роллы')->slug('-')->snake(),
                'image' => '6.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            13 => [
                'name' => 'Роллы',
                'slug' => \Str::of('Роллы')->slug('-')->snake(),
                'image' => '6.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            14 => [
                'name' => 'Кондитерские изделия',
                'slug' => \Str::of('Кондитерские изделия')->slug('-')->snake(),
                'image' => '7.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            15 => [
                'name' => 'Кондитерские изделия',
                'slug' => \Str::of('Кондитерские изделия')->slug('-')->snake(),
                'image' => '7.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            16 => [
                'name' => 'Блины',
                'slug' => \Str::of('Блины')->slug('-')->snake(),
                'image' => '8.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            17 => [
                'name' => 'Блины',
                'slug' => \Str::of('Блины')->slug('-')->snake(),
                'image' => '8.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            18 => [
                'name' => 'Выпечка',
                'slug' => \Str::of('Выпечка')->slug('-')->snake(),
                'image' => '9.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            19 => [
                'name' => 'Выпечка',
                'slug' => \Str::of('Выпечка')->slug('-')->snake(),
                'image' => '9.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            20 => [
                'name' => 'Супы',
                'slug' => \Str::of('Супы')->slug('-')->snake(),
                'image' => '10.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            21 => [
                'name' => 'Супы',
                'slug' => \Str::of('Супы')->slug('-')->snake(),
                'image' => '10.png',
                'parent_id' => 2,
                'show' => 1,
            ],

            22 => [
                'name' => 'Напитки',
                'slug' => \Str::of('Напитки')->slug('-')->snake(),
                'image' => '11.png',
                'parent_id' => 1,
                'show' => 1,
            ],

            23 => [
                'name' => 'Напитки',
                'slug' => \Str::of('Напитки')->slug('-')->snake(),
                'image' => '11.png',
                'parent_id' => 2,
                'show' => 1,
            ],

        ];
        \DB::table('categories')->insert($data);
    }
}
