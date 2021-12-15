<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'https://salatoff.ru/storage/product/PhujDpaZuT8MibLGyhxvXWOqH4Yi2gCg0ffj4XmZ.jpeg',
            'https://salatoff.ru/storage/product/SOhm0NJBB4zNZ44GbDJHhIWAVMAwcN7EemiA6MTG.jpeg',
            'https://salatoff.ru/storage/product/sU7AVU9if4Si5ZCzF27Pgad7TZ1kb04QngVO3hX5.jpeg',
            'https://salatoff.ru/storage/product/ff7eM7DohlXkFIuhpdOYqAFV49SHq1nmIjAJwvRr.jpeg',
            'https://salatoff.ru/storage/product/upload/1.%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%81%D0%B0%D0%BB%D0%B0%D1%82%D1%8B/%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%81%D0%B0%D0%BB%D0%B0%D1%82%D1%8B%20%D0%B2%D0%B5%D1%81%D0%BE%D0%B2%D1%8B%D0%B5/%D0%B4%D0%B0%D0%BC%D1%81%D0%BA%D0%B8%D0%B9.jpg',
            'https://salatoff.ru/storage/product/upload/1.%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%81%D0%B0%D0%BB%D0%B0%D1%82%D1%8B/%D0%A2%D1%80%D0%B0%D0%B4%D0%B8%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5%20%D1%81%D0%B0%D0%BB%D0%B0%D1%82%D1%8B%20%D0%B2%D0%B5%D1%81%D0%BE%D0%B2%D1%8B%D0%B5/%D0%9E%D1%80%D0%B8%D0%B3%D0%B8%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9.jpg',
            'https://salatoff.ru/storage/product/vgmwVMAhaDMFz1Az9RHCYcziROiZhDTXcspMisCL.jpeg',
            'https://salatoff.ru/storage/product/WFOwFlv5Gm74mn5IO842LOLvskGFQ6b4jqdTz8bB.jpeg',
            'https://salatoff.ru/storage/product/RMOieIT6p6BK6ZnkFg2XTrqcqfPRpC7mpL36pBAd.jpeg',
            'https://salatoff.ru/storage/product/Mt1jJ3V5u1YTNVzpZsIgZowpF0ODle3R5k1jh9u0.jpeg',
            'https://salatoff.ru/storage/product/4KwNaqnDWm2q2Y6FE9J3vP4jfxejpfAbZtwZnc1U.jpeg',
        ];


        $data = [];
        $catering = [];
        $dinner = [];

        for ($i = 1; $i < 150; $i++) {
            $title = 'Название товара_' . $i;
            $data[$i] = [
                'name' => $title,
                'slug' => \Str::of($title)->slug('-')->snake(),
                'category_id' => rand(3, 19),
                'price' => mt_rand(550, 1999) / 10,
                'show' => rand(0, 1),
                'image' => $images[rand(0, 10)],
                'add_image' => $images[rand(0, 10)],
            ];
        }


        for ($i = 1; $i < 15; $i++) {
            $title = 'Кейтеринг_' . $i;
            $catering[$i] = [
                'name' => $title,
                'slug' => \Str::of($title)->slug('-')->snake(),
                'category_id' => 18,
                'price' => mt_rand(550, 1999) / 10,
                'show' => rand(0, 1),
                'image' => '/theme/img/catering/' . rand(1, 7) . '.png',
                'add_image' => '/theme/img/catering/' . rand(1, 7) . '.png',
            ];
        }


        for ($i = 1; $i < 15; $i++) {
            $title = 'Комплесный обед_' . $i;
            $dinner[$i] = [
                'name' => $title,
                'slug' => \Str::of($title)->slug('-')->snake(),
                'category_id' => 19,
                'price' => mt_rand(550, 1999) / 10,
                'show' => rand(0, 1),
                'image' => '/theme/img/dinner/' . rand(1, 8) . '.jpeg',
                'add_image' => '/theme/img/dinner/' . rand(1, 8) . '.jpeg',
            ];
        }

        \DB::table('products')->insert($data);
        \DB::table('products')->insert($catering);
        \DB::table('products')->insert($dinner);

    }
}