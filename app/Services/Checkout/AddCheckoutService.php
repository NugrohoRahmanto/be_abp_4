<?php

namespace App\Services\Checkout;

use App\DTO\CheckoutDTO;
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

            if ($checkoutDTO->getIdMenu() == 0) {
                throw new Exception('Please select menu!');
            }else{
                $result = $this->checkoutRepository->addCheckout($checkoutDTO);
            }

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
