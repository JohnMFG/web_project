<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Bite'],
            ['id' => 2, 'name' => 'Tele2'],
            ['id' => 3, 'name' => 'Omnitel']
        ];
        foreach ($items as $item) {
            DB::table('operator')->insert($item);
        }
    }
}
