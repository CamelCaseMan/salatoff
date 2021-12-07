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
                'weight' => mt_rand(550, 1999),
                'nutrients' => 'Белки ' . mt_rand(100, 1999) . 'г. Жиры ' . mt_rand(100, 1999) . 'г. Углеводы ' . mt_rand(100, 1999) . ' г.',
                'energy' => mt_rand(100, 1999) . ' ккал/' . mt_rand(100, 1999) . '  кДж',
                'composition' => 'филе куриное, хлеб пшеничный, яйцо куриное, масло растительное, мука пшеничная высший сорт, майонез, чеснок, соль пищевая.',
                'implementation_period' => mt_rand(1, 99) . ' часа',
                'packaging' => \Str::random(10)
            ];
        }
        \DB::table('attributes')->insert($data);
    }
}
