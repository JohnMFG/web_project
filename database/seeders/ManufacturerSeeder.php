<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Samsung'],
            ['id' => 2, 'name' => 'Apple'],
            ['id' => 3, 'name' => 'Huawei']
        ];
        foreach ($items as $item) {
            DB::table('manufacturer')->insert($item);
        }
    }
}
