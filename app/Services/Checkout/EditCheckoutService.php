<?php

namespace App\Services\Checkout;

use Exception;
use App\Repositories\Checkout\EditCheckoutRepository;
use Illuminate\Http\Request;
use App\DTO\CheckoutDTO;

class EditCheckoutService
{
    public function __construct(
        private EditCheckoutRepository $checkoutRepository,
    ) {}

    public function editCheckout(Request $request)
    {
        try {
            request()->validate([
                'bookingId' => 'required',
                'menuId' => 'required',
                'quantity' => 'required'
            ]);

            $checkoutDTO = new CheckoutDTO(
                idBooking: $request->bookingId,
                idMenu: $request->menuId,
                quantity: $request->quantity
            );

            $result = $this->checkoutRepository->editCheckout($checkoutDTO);
        
            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
