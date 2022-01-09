<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items')->insert([
            [
                'code'          => 'A',
                'name'          => 'ItemA',
            ],
            [
                'code'          => 'B',
                'name'          => 'ItemB',
            ],
            [
                'code'          => 'C',
                'name'          => 'ItemC',
            ],
        ]);
    }
}
