<?php

namespace App\Repositories\Checkout;

use App\DTO\CheckoutDTO;
use Exception;
use App\Models\Checkout;

class EditCheckoutRepository
{
    public function editCheckout(CheckoutDTO $checkoutDTO)
    {
        try {
            $resultDelete = Checkout::where('idBooking', $checkoutDTO->getIdBooking())
                ->where('idMenu', $checkoutDTO->getIdMenu())
                ->delete();

            if (!$resultDelete) {
                throw new Exception('Booking-Menu relation not found');
            }

            $checkout = new Checkout();
            $checkout->idBooking = $checkoutDTO->getIdBooking();
            $checkout->idMenu = $checkoutDTO->getIdMenu();
            $checkout->quantity = $checkoutDTO->getQuantity();
            $checkout->save();

            return $checkout;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
