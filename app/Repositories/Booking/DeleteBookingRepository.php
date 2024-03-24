<?php

namespace App\Repositories\Booking;

use Exception;

use App\DTO\BookingDTO;
use App\Models\Booking;

class DeleteBookingRepository {
    /**
     * Delete Booking
     * @param BookingDTO $BookingDTO
     * @return BookingDTO
     */
    public function deleteBooking(BookingDTO $bookingDTO) {
        try {
            $booking = Booking::findOrFail($bookingDTO->id);
            $booking->delete();

            return $booking;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
