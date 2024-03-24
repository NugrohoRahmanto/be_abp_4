<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Booking::create([
                'namaPemesan' => 'Pemesan ' . $i,
                'nomorMeja' => rand(1, 10),
                'telpPemesan' => '08123456789',
                'jamAmbil' => '12:00:00',
                'statusAmbil' => 'Take Away',
                'shop_id' => rand(1, 3),
            ]);
        }
    }
}
