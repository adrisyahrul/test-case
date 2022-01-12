<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test-case.com',
            'password' => bcrypt('admin123'),
        ]);

        $this->call([
            CustomerSeeder::class,
            ItemsSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class
        ]);
    }
}
