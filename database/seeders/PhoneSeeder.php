<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'S20', 'storage' => '124', 'price' => '543', 'manufacturer_id' => 1],
            ['id' => 2, 'name' => 'S10', 'storage' => '64', 'price' => '452' , 'manufacturer_id' => 1],
            ['id' => 3, 'name' => 'A51', 'storage' => '32', 'price' => '150' , 'manufacturer_id' => 1],
            ['id' => 4, 'name' => '12', 'storage' => '124', 'price' => '1050' , 'manufacturer_id' => 2],
            ['id' => 5, 'name' => '11', 'storage' => '124', 'price' => '600' , 'manufacturer_id' => 2],
            ['id' => 6, 'name' => '8', 'storage' => '64', 'price' => '300' , 'manufacturer_id' => 2],
            ['id' => 7, 'name' => '7', 'storage' => '32', 'price' => '250' , 'manufacturer_id' => 2],
            ['id' => 8, 'name' => 'P Smart', 'storage' => '64', 'price' => '189' , 'manufacturer_id' => 3],
            ['id' => 9, 'name' => 'P40', 'storage' => '124', 'price' => '400' , 'manufacturer_id' => 3],
            ['id' => 10, 'name' => 'P40 Pro', 'storage' => '256', 'price' => '450' , 'manufacturer_id' => 3],
            ['id' => 11, 'name' => 'P30', 'storage' => '64', 'price' => '250' , 'manufacturer_id' => 3],
            ['id' => 12, 'name' => 'P30 Pro', 'storage' => '124', 'price' => '325' , 'manufacturer_id' => 3]

        ];
        foreach ($items as $item) {
            DB::table('phone')->insert($item);
        }
    }
}
