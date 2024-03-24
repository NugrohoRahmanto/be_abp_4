<?php

namespace App\Repositories\Checkout;

use Exception;
use App\Models\Checkout;

class DeleteCheckoutRepository
{
    public function deleteCheckout($idBooking, $idMenu)
    {
        try {
            $relation = Checkout::where('idBooking', $idBooking)
                ->where('idMenu', $idMenu)
                ->first();

            if (!$relation) {
                throw new Exception('Booking-Menu relation not found');
            }else{
                Checkout::where('idBooking', $idBooking)
                ->where('idMenu', $idMenu)
                ->delete();
            }

            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
