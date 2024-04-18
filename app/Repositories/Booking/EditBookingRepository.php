<?php

namespace App\Repositories\Booking;

use Exception;

use App\DTO\BookingDTO;
use App\Models\Booking;

class EditBookingRepository {
    /**
     * Edit Booking
     * @param BookingDTO $BookingDTO
     * @return BookingDTO
     */
    public function editBooking(BookingDTO $bookingDTO) {
        try {
            $booking = Booking::find($bookingDTO->id);
            if ($booking->nomorMeja != $bookingDTO->nomorMeja) {
                $booking->nomorMeja = $bookingDTO->nomorMeja;
            }
            $booking->jamAmbil = $bookingDTO->jamAmbil;
            $booking->statusAmbil = $bookingDTO->statusAmbil;
            $booking->save();

            return $booking;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
