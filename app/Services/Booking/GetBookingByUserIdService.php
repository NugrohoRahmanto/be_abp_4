<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Booking\GetBookingByUserIdRepository;

class GetBookingByUserIdService {
    public function __construct(
        private GetBookingByUserIdRepository $bookingByIdRepository
    ) {}

    /**
     * Get  Booking
     * @return array
     */
    public function getBookingById(Request $request) {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id = $request->user_id;

            return $this->bookingByIdRepository->getBookingById($user_id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
