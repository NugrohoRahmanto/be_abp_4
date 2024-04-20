<?php

namespace App\Repositories\Checkout;

use App\DTO\CheckoutDTO;
use Exception;
use App\Models\Checkout;

class DeleteCheckoutRepository
{
    public function deleteCheckout(CheckoutDTO $checkoutDTO)
    {
        try {
            $relation = Checkout::where('idBooking', $checkoutDTO->getIdBooking())
                ->where('idMenu', $checkoutDTO->getIdMenu())
                ->first();

            if (!$relation) {
                throw new Exception('Booking-Menu relation not found');
            }else{
                Checkout::where('idBooking', $checkoutDTO->getIdBooking())
                ->where('idMenu', $checkoutDTO->getIdMenu())
                ->delete();
            }

            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
