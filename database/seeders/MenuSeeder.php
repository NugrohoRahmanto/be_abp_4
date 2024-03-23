<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuCategory;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data menu dummy
        $menus = [
            ['namaMenu' => 'Nasi Goreng', 'hargaMenu' => 15000, 'StokMenu' => 10 , 'deskripsiMenu' => 'Nasi goreng spesial', 'shop_id' => 1],
            ['namaMenu' => 'Ayam Goreng', 'hargaMenu' => 20000, 'StokMenu' => 20 , 'deskripsiMenu' => 'Ayam goreng crispy', 'shop_id' => 2],
            ['namaMenu' => 'Es Teh', 'hargaMenu' => 5000, 'StokMenu' => 30 , 'deskripsiMenu' => 'Es teh manis', 'shop_id' => 3],
        ];

        foreach ($menus as $menuData) {
            $menu = Menu::create($menuData);

            $randomCategories = MenuCategory::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $menu->menucategories()->attach($randomCategories);
        }
    }
}
