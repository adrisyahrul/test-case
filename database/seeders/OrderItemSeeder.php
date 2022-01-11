<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_item')->insert([
            [
                'order_id'     => '1',
                'item'      => 'A',
                'qty'       => '2',
                'price'     => '100',
                'total'     => '200',
            ],
            [
                'order_id'     => '1',
                'item'      => 'B',
                'qty'       => '3',
                'price'     => '200',
                'total'     => '600',
            ],
            [
                'order_id'     => '2',
                'item'      => 'C',
                'qty'       => '1',
                'price'     => '300',
                'total'     => '300',
            ],
            [
                'order_id'     => '2',
                'item'      => 'A',
                'qty'       => '4',
                'price'     => '120',
                'total'     => '480',
            ],
            [
                'order_id'     => '3',
                'item'      => 'A',
                'qty'       => '2',
                'price'     => '110',
                'total'     => '220',
            ],
            [
                'order_id'     => '3',
                'item'      => 'B',
                'qty'       => '1',
                'price'     => '210',
                'total'     => '210',
            ],
            [
                'order_id'     => '3',
                'item'      => 'C',
                'qty'       => '2',
                'price'     => '310',
                'total'     => '620',
            ],
            [
                'order_id'     => '4',
                'item'      => 'B',
                'qty'       => '1',
                'price'     => '220',
                'total'     => '220',
            ],
            [
                'order_id'     => '4',
                'item'      => 'C',
                'qty'       => '4',
                'price'     => '320',
                'total'     => '1280',
            ],
            [
                'order_id'     => '5',
                'item'      => 'B',
                'qty'       => '2',
                'price'     => '230',
                'total'     => '460',
            ],
            [
                'order_id'     => '5',
                'item'      => 'A',
                'qty'       => '4',
                'price'     => '110',
                'total'     => '440',
            ],
        ]);
    }
}
