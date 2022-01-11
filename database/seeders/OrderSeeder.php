<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order')->insert([
            [
                'date'          => '1-Jan',
                'customer_id'      => '1',
                'subtotal'      => '800',
                'discount'      => '0',
                'total'         => '800',
            ],
            [
                'date'          => '1-Jan',
                'customer_id'      => '1',
                'subtotal'      => '780',
                'discount'      => '0',
                'total'         => '780',
            ],
            [
                'date'          => '2-Jan',
                'customer_id'      => '1',
                'subtotal'      => '1050',
                'discount'      => '0',
                'total'         => '1050',
            ],
            [
                'date'          => '4-Jan',
                'customer_id'      => '1',
                'subtotal'      => '1500',
                'discount'      => '100',
                'total'         => '1400',
            ],
            [
                'date'          => '4-Jan',
                'customer_id'   => '1',
                'subtotal'      => '900',
                'discount'      => '0',
                'total'         => '900',
            ],
        ]);
    }
}
