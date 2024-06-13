<?php

namespace App\Repositories\Checkout;

use App\DTO\CheckoutDTO;
use App\Models\Checkout;
use App\Models\Booking;
use App\Models\Menu;
use Exception;


class AddCheckoutRepository
{
    public function addCheckout(CheckoutDTO $checkoutDTO)
    {
        try {
            $booking = Booking::find($checkoutDTO->getIdBooking());
            $menu = Menu::find($checkoutDTO->getIdMenu());

            if (!$menu || !$booking) {
                throw new Exception('Booking or Menu not found');
            }

            // Cek apakah relasi menu dan booking sudah ada
            $existingRelation = Checkout::where('idBooking', $checkoutDTO->getIdBooking())
                ->where('idMenu', $checkoutDTO->getIdMenu())
                ->first();

            if ($existingRelation) {
                throw new Exception('This menu and booking relation already exists');
            }

            // Tambahkan relasi menu dan booking ke tabel checkout
            $checkout = new Checkout();
            $checkout->idBooking = $checkoutDTO->getIdBooking();
            $checkout->idMenu = $checkoutDTO->getIdMenu();
            $checkout->quantity = $checkoutDTO->getQuantity();
            $checkout->save();

            return $checkoutDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
