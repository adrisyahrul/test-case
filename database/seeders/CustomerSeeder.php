<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('customer')->insert([
            [
                'code'          => 'A',
                'name'          => 'CustomerA',
            ],
            [
                'code'          => 'B',
                'name'          => 'CustomerB',
            ],
            [
                'code'          => 'C',
                'name'          => 'CustomerC',
            ],
        ]);
    }
}
