<?php

namespace App\Services\Checkout;

use Exception;
use App\Repositories\Checkout\AddCheckoutRepository;
use Illuminate\Http\Request;

class AddCheckoutService
{
    public function __construct(
        private AddCheckoutRepository $checkoutRepository,
    ) {}

    public function addCheckout(Request $request)
    {
        try {
            $bookingId = $request->bookingId;
            $menuId = $request->menuId;
            $quantity = $request->quantity;

            if ($menuId == 0) {
                throw new Exception('Please select menu!');
            }else{
                $result = $this->checkoutRepository->addCheckout($bookingId, $menuId, $quantity);
            }

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
