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
            $booking->namaPemesan = $bookingDTO->namaPemesan;
            $booking->nomorMeja = $bookingDTO->nomorMeja;
            $booking->telpPemesan = $bookingDTO->telpPemesan;
            $booking->jamAmbil = $bookingDTO->jamAmbil;
            $booking->statusAmbil = $bookingDTO->statusAmbil;
            $booking->shop_id = $bookingDTO->shop_id;
            $booking->save();

            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
