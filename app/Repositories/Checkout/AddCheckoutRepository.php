<?php

namespace App\Repositories\Checkout;

use App\DTO\CheckoutDTO;
use App\Models\Checkout;
use App\Models\Booking;
use App\Models\Menu;
use Exception;


class AddCheckoutRepository
{
    public function addCheckout($idBooking, $idMenu, $quantity)
    {
        try {
            $booking = Booking::find($idBooking);
            $menu = Menu::find($idMenu);

            if (!$menu || !$booking) {
                throw new Exception('Booking or Menu not found');
            }

            // Cek apakah relasi menu dan booking sudah ada
            $existingRelation = Checkout::where('idBooking', $idBooking)
                ->where('idMenu', $idMenu)
                ->first();

            if ($existingRelation) {
                throw new Exception('This menu and booking relation already exists');
            }

            // Tambahkan relasi menu dan booking ke tabel checkout
            $checkout = new Checkout();
            $checkout->idBooking = $idBooking;
            $checkout->idMenu = $idMenu;
            $checkout->quantity = $quantity;
            $checkout->save();

            $check = new CheckoutDTO(
                idBooking : $booking->id,
                idMenu : $menu->id,
                quantity : $quantity
            );

            return $check;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
