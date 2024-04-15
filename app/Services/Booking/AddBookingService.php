<?php

namespace App\Services\Booking;

use Illuminate\Http\Request;

use App\DTO\BookingDTO;
use Exception;

use App\Repositories\Booking\AddBookingRepository;


class AddBookingService {
    public function __construct(
        private AddBookingRepository $addBookingRepository
    ) {}

    /**
     * Register new Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function addBooking(Request $request, $user_id) {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $bookingDTO = new BookingDTO(
                id : null,
                nomorMeja: null,
                jamAmbil: null,
                statusAmbil: null,
                user_id: $user_id,
            );

            $userResult = $this->addBookingRepository->addBooking($bookingDTO);

            return ([
                'nomorMeja' => $userResult->getNomorMeja(),
                'jamAmbil' => $userResult->getJamAmbil(),
                'statusAmbil' => $userResult->getStatusAmbil(),
                'user_id' => $userResult->getUserId(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
