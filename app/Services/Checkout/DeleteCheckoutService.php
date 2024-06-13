<?php

namespace App\Services\Checkout;

use App\DTO\CheckoutDTO;
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
            request()->validate([
                'bookingId' => 'required',
                'menuId' => 'required',
            ]);

            $checkoutDTO = new CheckoutDTO(
                idBooking: $request->bookingId,
                idMenu: $request->menuId
            );

            $result = $this->checkoutRepository->deleteCheckout($checkoutDTO);
        
            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
