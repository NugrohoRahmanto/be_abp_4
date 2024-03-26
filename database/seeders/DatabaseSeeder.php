<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MenuCategorySeeder::class,
            ShopSeeder::class,
            DiscountSeeder::class,
            MenuSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
