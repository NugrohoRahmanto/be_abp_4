<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Booking\GetAllBookingRepository;

class GetAllBookingService {
    public function __construct(
        private GetAllBookingRepository $bookingRepository
    ) {}

    /**
     * Get all Booking
     * @return array
     */
    public function getAllBooking(Request $request) {
        try {
            return $this->bookingRepository->getAllBooking($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
