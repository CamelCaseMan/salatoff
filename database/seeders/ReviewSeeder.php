<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[0] = [
            'name' => 'Николай',
            'text' => 'Всё так вкусно! Всегда заказываю Salatoff, когда устаю после работы, а покушать нечего.',
            'status' => 1,
            'code' => 'iNCHNGzByPjhApvn7XBD'
        ];

        $data[1] = [
            'name' => 'Ксения',
            'text' => 'Заказывала пирожки с разными начинками. Понравились все!!! Очень вкусные и свежие. Буду заказывать еще.',
            'status' => 1,
            'code' => 'iNCHNGzByPjhApvn7XBD'
        ];

        $data[2] = [
            'name' => 'Светлана',
            'text' => 'Привезли очень быстро, все горячее и очень вкусное, все пальчики оближешь',
            'status' => 1,
            'code' => 'iNCHNGzByPjhApvn7XBD'
        ];

        $data[3] = [
            'name' => 'Мария',
            'text' => 'Когда совсем лень готовить и хочется чего-нибудь вкусненького, мы обычно заказываем готовую еду с доставкой на дом на salatoff.ru Особенно понравились блинчики с капустой, салаты цезарь и греческий, грибной суп-пюре, картошка с грибами и рис с овощами! Спасибо за вкусные и доступные блюда, а главное за быструю доставку! Вы лучшие, буду брать только у вас!',
            'status' => 1,
            'code' => 'iNCHNGzByPjhApvn7XBD'
        ];

        \DB::table('reviews')->insert($data);
    }
}
