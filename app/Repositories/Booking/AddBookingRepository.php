<?php

namespace App\Repositories\Booking;

use Exception;
use App\DTO\BookingDTO;

use App\Models\Booking;

class AddBookingRepository {
    /**
     * Register new Booking
     * @param BookingDTO $BookingDTO
     * @return BookingDTO
     */
    public function addBooking(BookingDTO $bookingDTO) {
        try {
            $booking = new Booking();
            $booking->nomorMeja = $bookingDTO->nomorMeja;
            $booking->jamAmbil = $bookingDTO->jamAmbil;
            $booking->statusAmbil = $bookingDTO->statusAmbil;
            $booking->user_id = $bookingDTO->user_id;
            $booking->save();

            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
