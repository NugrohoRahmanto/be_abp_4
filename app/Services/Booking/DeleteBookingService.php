<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BookingDTO;

use App\Repositories\Booking\DeleteBookingRepository;

class DeleteBookingService {
    public function __construct(
        private DeleteBookingRepository $bookingRepository
    ) {}

    /**
     * Delete Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function deleteBooking(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:bookings,id',
            ]);

            $bookingDTO = new BookingDTO(
                id : $request->id
            );

            $bookingDTO = $this->bookingRepository->deleteBooking($bookingDTO);

            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
