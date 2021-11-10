<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data[0] = [
            'title' => '«Еда без забот» – Изготовление и производство салатов и кулинарии с доставкой по Москве',
            'desсription' => 'Изготовление и производство кулинарии, выпечки, салатов, кондитерских изделий и блюд японской кухни с доставкой по Москве. ☎ +7 (495) 797 64 57.',
            'keywords' => '',
        ];


        \DB::table('seos')->insert($data);
    }
}
