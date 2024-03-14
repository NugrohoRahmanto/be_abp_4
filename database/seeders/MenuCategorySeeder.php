<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuCategory::create([
            'namaMenuKategori' => 'Nasi'
        ]);

        MenuCategory::create([
            'namaMenuKategori' => 'Minum'
        ]);

        MenuCategory::create([
            'namaMenuKategori' => 'Sayur'
        ]);

        MenuCategory::create([
            'namaMenuKategori' => 'Daging Ayam'
        ]);

        MenuCategory::create([
            'namaMenuKategori' => 'Daging Sapi'
        ]);
        
        MenuCategory::create([
            'namaMenuKategori' => 'Daging Kambing'
        ]);
    }
}
