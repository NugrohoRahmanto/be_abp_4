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
        Booking::create([
            'nomorMeja' => '' . rand(1, 10),
            'jamAmbil' => '12:00:00',
            'statusAmbil' => 'Take Away',
            'statusSelesai' => 'Selesai',
            'user_id' => 2
        ]);

        Booking::create([
            'nomorMeja' => '' . rand(1, 10),
            'jamAmbil' => '13:00:00',
            'statusAmbil' => 'Take Away',
            'user_id' => 3
        ]);

        Booking::create([
            'nomorMeja' => '' . rand(1, 10),
            'jamAmbil' => '14:00:00',
            'statusAmbil' => 'Take Away',
            'user_id' => 4
        ]);
    }
}
