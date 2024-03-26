<?php

namespace App\Services\Booking;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Booking\GetBookingByShopIdRepository;

class GetBookingByShopIdService {
    public function __construct(
        private GetBookingByShopIdRepository $bookingByIdRepository
    ) {}

    /**
     * Get  Booking
     * @return array
     */
    public function getBookingById(Request $request) {
        try {
            $request->validate([
                'shop_id' => 'required|exists:shops,id',
            ]);

            $shop_id = $request->shop_id;

            return $this->bookingByIdRepository->getBookingById($shop_id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
