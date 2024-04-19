<?php

namespace Database\Seeders;

use App\Models\Checkout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Checkout::create([
            'idBooking' => 1,
            'idMenu' => 1,
            'quantity' => 5,
        ]);

        Checkout::create([
            'idBooking' => 1,
            'idMenu' => 2,
            'quantity' => 10,
        ]);

        Checkout::create([
            'idBooking' => 1,
            'idMenu' => 3,
            'quantity' => 15,
        ]);

        Checkout::create([
            'idBooking' => 2,
            'idMenu' => 2,
            'quantity' => 20,
        ]);

        Checkout::create([
            'idBooking' => 2,
            'idMenu' => 3,
            'quantity' => 25,
        ]);
    }
}
