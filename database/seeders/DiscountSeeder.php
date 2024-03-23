<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::create([
            'kodeDiskon' => 'DISC01',
            'persentaseDiskon' => 10,
            'quantityDiskon' => 10,
            'deskripsiDiskon' => 'Diskon 10% untuk pembelian minimal 10 item',
            'shop_id' => 1
        ]);

        Discount::create([
            'kodeDiskon' => 'DISC02',
            'persentaseDiskon' => 20,
            'quantityDiskon' => 20,
            'deskripsiDiskon' => 'Diskon 20% untuk pembelian minimal 20 item',
            'shop_id' => 2
        ]);

        Discount::create([
            'kodeDiskon' => 'DISC03',
            'persentaseDiskon' => 30,
            'quantityDiskon' => 30,
            'deskripsiDiskon' => 'Diskon 30% untuk pembelian minimal 30 item',
            'shop_id' => 3
        ]);
    }
}
