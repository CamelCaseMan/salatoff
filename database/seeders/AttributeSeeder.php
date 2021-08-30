<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i < 150; $i++) {
            $data[$i] = [
                'product_id' => $i,
                'nutrients' => \Str::random(30),
                'energy' => \Str::random(20),
                'composition' => 'филе куриное, хлеб пшеничный, яйцо куриное, масло растительное, мука пшеничная высший сорт, майонез, чеснок, соль пищевая.',
                'implementation_period' => \Str::random(15),
                'packaging' => \Str::random(10)
            ];
        }
        \DB::table('attributes')->insert($data);
    }
}
