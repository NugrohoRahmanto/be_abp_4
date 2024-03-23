<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'namaToko' => 'Toko A',
            'nomorToko' => '01',
            'user_id' => 1
        ]);

        Shop::create([
            'namaToko' => 'Toko B',
            'nomorToko' => '02',
            'user_id' => 2
        ]);

        Shop::create([
            'namaToko' => 'Toko C',
            'nomorToko' => '03',
            'user_id' => 3
        ]);
        
    }
}
