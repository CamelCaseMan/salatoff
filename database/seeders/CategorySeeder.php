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

            1 => [
                'name' => 'Фасованные',
                'slug' => \Str::of('Фасованные')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 0,
                'show' => 1,
                'sort' => 1,
                'style' => ''
            ],

            2 => [
                'name' => 'Весовые',
                'slug' => \Str::of('Весовые')->slug('-')->snake(),
                'image' => '',
                'parent_id' => 0,
                'show' => 1,
                'sort' => 0,
                'style' => ''
            ],

            3 => [
                'name' => 'Традиционные салаты',
                'slug' => \Str::of('Традиционные салаты')->slug('-')->snake(),
                'image' => '1.jpg',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 2,
                'style' => 'background-color: #70B0FF; color: #70B0FF;'
            ],

            4 => [
                'name' => 'Традиционные салаты',
                'slug' => \Str::of('Традиционные салаты')->slug('-')->snake(),
                'image' => '1.jpg',
                'parent_id' => 2,
                'show' => 1,
                'sort' => 2,
                'style' => 'background-color: #70B0FF; color: #70B0FF;'
            ],

            5 => [
                'name' => 'Корейские салаты',
                'slug' => \Str::of('Корейские салаты')->slug('-')->snake(),
                'image' => '2.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 3,
                'style' => 'background-color: #FFA64D; color: #FFA64D;'
            ],

            6 => [
                'name' => 'Корейские салаты',
                'slug' => \Str::of('Корейские салаты')->slug('-')->snake(),
                'image' => '2.png',
                'parent_id' => 2,
                'show' => 1,
                'sort' => 3,
                'style' => 'background-color: #FFA64D; color: #FFA64D;'
            ],

            7 => [
                'name' => 'Готовая кулинария',
                'slug' => \Str::of('Готовая кулинария')->slug('-')->snake(),
                'image' => '3.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 4,
                'style' => 'background-color: #4CD9C3; color: #4CD9C3;'
            ],

            8 => [
                'name' => 'Готовая кулинария',
                'slug' => \Str::of('Готовая кулинария')->slug('-')->snake(),
                'image' => '3.png',
                'parent_id' => 2,
                'show' => 1,
                'sort' => 4,
                'style' => 'background-color: #4CD9C3; color: #4CD9C3;'
            ],

            9 => [
                'name' => 'Блины',
                'slug' => \Str::of('Блины')->slug('-')->snake(),
                'image' => '8.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 9,
                'style' => 'background-color: #70B0FF; color: #70B0FF;'
            ],

            10 => [
                'name' => 'Блины',
                'slug' => \Str::of('Блины')->slug('-')->snake(),
                'image' => '8.png',
                'parent_id' => 2,
                'show' => 1,
                'sort' => 9,
                'style' => 'background-color: #70B0FF; color: #70B0FF;'
            ],

            11 => [
                'name' => 'Бутерброды и сэндвичи',
                'slug' => \Str::of('Бутерброды и сэндвичи')->slug('-')->snake(),
                'image' => '5.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 6,
                'style' => 'background-color: #5CC19A; color: #5CC19A;'
            ],

            12 => [
                'name' => 'Кондитерские изделия',
                'slug' => \Str::of('Кондитерские изделия')->slug('-')->snake(),
                'image' => '7.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 8,
                'style' => 'background-color: #FFBFFF; color: #FFBFFF;'
            ],

            13 => [
                'name' => 'Роллы',
                'slug' => \Str::of('Роллы')->slug('-')->snake(),
                'image' => '6.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 7,
                'style' => 'background-color: #FFA64D; color: #FFA64D;'
            ],

            14 => [
                'name' => 'Супы',
                'slug' => \Str::of('Супы')->slug('-')->snake(),
                'image' => '10.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 11,
                'style' => 'background-color: #4CD9C3; color: #4CD9C3;'
            ],

            15 => [
                'name' => 'Супы',
                'slug' => \Str::of('Супы')->slug('-')->snake(),
                'image' => '10.png',
                'parent_id' => 2,
                'show' => 1,
                'sort' => 11,
                'style' => 'background-color: #4CD9C3; color: #4CD9C3;'
            ],

            16 => [
                'name' => 'Напитки',
                'slug' => \Str::of('Напитки')->slug('-')->snake(),
                'image' => '11.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 12,
                'style' => 'background-color: #FF80A6; color: #FF80A6;'
            ],

            17 => [
                'name' => 'Выпечка',
                'slug' => \Str::of('Выпечка')->slug('-')->snake(),
                'image' => '9.png',
                'parent_id' => 1,
                'show' => 1,
                'sort' => 10,
                'style' => 'background-color: #FF80A6; color: #FF80A6;'
            ],

            18 => [
                'name' => 'Кейтеринг',
                'slug' => 'catering',
                'image' => '11.png',
                'parent_id' => 0,
                'show' => 1,
                'sort' => 12,
                'style' => 'background-color: #FF80A6; color: #FF80A6;'
            ],

            19 => [
                'name' => 'Комплесные обеды',
                'slug' => 'dinner',
                'image' => '4.jpg',
                'parent_id' => 0,
                'show' => 1,
                'sort' => 5,
                'style' => 'background-color: #FFBF8C; color: #FFBF8C;'
            ],
        ];

        \DB::table('categories')->insert($data);
    }
}
