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
                'name' => 'Традиционные салаты',
                'slug' => \Str::of('Традиционные салаты')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/tradition%20salat.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],
            1 => [
                'name' => 'Фасованные',
                'slug' => \Str::of('Фасованные')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 1,
                'show' => 1,
            ],
            2 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 1,
                'show' => 1,
            ],


            3 => [
                'name' => 'Корейские салаты',
                'slug' => \Str::of('Корейские салаты')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/koreiskie%20salati.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],
            4 => [
                'name' => 'Фасованные',
                'slug' => \Str::of('Фасованные')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 4,
                'show' => 1,
            ],
            5 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 4,
                'show' => 1,
            ],

            6 => [
                'name' => 'Готовая кулинария',
                'slug' => \Str::of('Готовая кулинария')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/kulinariya2.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],
            7 => [
                'name' => 'Фасованная',
                'slug' => \Str::of('Фасованная')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 7,
                'show' => 1,
            ],
            8 => [
                'name' => 'Весовая',
                'slug' => \Str::of('Весовая')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 7,
                'show' => 1,
            ],

            9 => [
                'name' => 'Блины',
                'slug' => \Str::of('Блины')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/blini.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],
            10 => [
                'name' => 'Фасованные',
                'slug' => \Str::of('Фасованные')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 10,
                'show' => 1,
            ],
            11 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 10,
                'show' => 1,
            ],

            12 => [
                'name' => 'Бутерброды и сэндвичи',
                'slug' => \Str::of('Бутерброды и сэндвичи')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/sendvich.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

            13 => [
                'name' => 'Кондитерские изделия',
                'slug' => \Str::of('Кондитерские изделия')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/konditer.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

            14 => [
                'name' => 'Роллы',
                'slug' => \Str::of('Роллы')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/roll2.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

            15 => [
                'name' => 'Супы',
                'slug' => \Str::of('Супы')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/category/soupi.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],
            16 => [
                'name' => 'Фасованные',
                'slug' => \Str::of('Фасованные')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 16,
                'show' => 1,
            ],
            17 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 16,
                'show' => 1,
            ],

            18 => [
                'name' => 'Напитки',
                'slug' => \Str::of('Напитки')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/product/lZIGzsxyYdblrP62ZsUFCTgCyXSV8OqzEBQwmydV.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

            19 => [
                'name' => 'Выпечка',
                'slug' => \Str::of('Выпечка')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/product/6unjiFbtQA1yyfELDgBoKBRmfMsVjDd68bhho2hN.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

            20 => [
                'name' => 'Комплесные обеды',
                'slug' => \Str::of('Комплесные обеды')->slug('-')->snake(),
                'image' => 'https://salatoff.ru/storage/product/KSmpn4ndxfYHbcegzNADY49NJ0mRzfVbnIPqN7Il.jpeg',
                'parent_id' => 0,
                'show' => 1,
            ],

        ];
        \DB::table('categories')->insert($data);
    }
}
