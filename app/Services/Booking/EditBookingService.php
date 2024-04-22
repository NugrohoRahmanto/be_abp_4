<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\DTO\BookingDTO;

use App\Repositories\Booking\EditBookingRepository;

class EditBookingService {
    public function __construct(
        private EditBookingRepository $bookingRepository
    ) {}

    /**
     * Edit Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function editBooking(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:bookings,id',
                'statusAmbil' => 'required',
            ]);

            $bookingDTO = new BookingDTO(
                id: $request->id,
                jamAmbil: $request->jamAmbil,
                statusAmbil: $request->statusAmbil,
                nomorMeja: $request->nomorMeja,
            );

            $bookingDTO = $this->bookingRepository->editBooking($bookingDTO);

            return $bookingDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
