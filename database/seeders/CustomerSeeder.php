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
        \DB::table('customers')->insert([
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
