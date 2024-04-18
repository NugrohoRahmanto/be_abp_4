<?php

namespace App\Repositories\Booking;

use Exception;

use App\Models\Booking;

class GetAllBookingRepository
{
    public function getAllBooking()
    {
        try{
            $bookings = Booking::join('users', 'bookings.user_id', '=', 'users.id')
                ->select('bookings.*', 'users.fullName', 'users.nickname', 'users.phoneNumber')
                ->get();

            $bookingDTOs = [];

            foreach ($bookings as $booking) {
                $bookingDTO = [
                    'id' => $booking->id,
                    'nomorMeja' => $booking->nomorMeja,
                    'jamAmbil' => $booking->jamAmbil,
                    'totalHarga' => $booking->totalHarga,
                    'statusAmbil' => $booking->statusAmbil,
                    'statusSelesai' => $booking->statusSelesai,
                    'user_id' => $booking->user_id,
                    'user_fullName' => $booking->fullName,
                    'user_nickname' => $booking->nickname,
                    'user_phoneNumber' => $booking->phoneNumber,
                ];

                array_push($bookingDTOs, $bookingDTO);
            }

            return $bookingDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
