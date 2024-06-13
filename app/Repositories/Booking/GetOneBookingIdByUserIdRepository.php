<?php

namespace App\Repositories\Booking;

use Exception;

use App\Models\Booking;

class GetOneBookingIdByUserIdRepository
{
    public function getBookingById($user_id)
    {
        try{
            $bookings = Booking::select('id')
                ->where('user_id', $user_id)
                ->where('statusSelesai', 'Belum')
                ->get();

            return $bookings;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
