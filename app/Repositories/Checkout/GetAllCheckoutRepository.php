<?php

namespace App\Repositories\Checkout;

use App\DTO\BookingDTO;
use Exception;
use App\Models\Checkout;
use App\Models\Menu;
use App\Models\Booking;

class GetAllCheckoutRepository
{
    public function getAllCheckout($bookingId)
    {
        try {
            // Mengambil data dari tabel booking berdasarkan ID
            $booking = Booking::find($bookingId);
            if (!$booking) {
                throw new Exception('Booking not found');
            }

            $bookingDTO = new BookingDTO(
                id : $booking->id,
                namaPemesan : $booking->namaPemesan,
                nomorMeja : $booking->nomorMeja,
                telpPemesan : $booking->telpPemesan,
                jamAmbil : $booking->jamAmbil,
                statusAmbil : $booking->statusAmbil,
            );

            // Mengambil data dari tabel Checkout berdasarkan ID Booking
            $pilihBookings = Checkout::where('idBooking', $bookingId)->get();
            $checkouts = collect();

            // Iterasi melalui setiap entri checkout untuk mendapatkan detailnya
            foreach ($pilihBookings as $pilihBookings) {
                $menu = Menu::select('id', 'namaMenu', 'hargaMenu', 'stokMenu')->find($pilihBookings->idMenu);

                if ($menu) {
                    $checkouts->push([
                        'Menu' => $menu,
                        'quantity' => $pilihBookings->quantity,
                    ]);
                }
            }

            return [
                'Booking' => $bookingDTO,
                'Checkout' => $checkouts,
            ];

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
