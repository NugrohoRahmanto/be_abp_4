<?php

namespace App\Services\Checkout;

use Exception;
use App\Repositories\Checkout\DeleteCheckoutRepository;
use Illuminate\Http\Request;

class DeleteCheckoutService
{
    public function __construct(
        private DeleteCheckoutRepository $checkoutRepository,
    ) {}

    public function deleteCheckout(Request $request)
    {
        try {
            $bookingId = $request->bookingId;
            $menuId = $request->menuId;

            $result = $this->checkoutRepository->deleteCheckout($bookingId, $menuId);
        
            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
