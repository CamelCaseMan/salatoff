<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CuponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'value' => '481WSZF3KF',
            'discount' => 10,
            'expiration' => '2022-10-20 12:00:00',
        ];

        \DB::table('cupons')->insert($data);
    }
}
