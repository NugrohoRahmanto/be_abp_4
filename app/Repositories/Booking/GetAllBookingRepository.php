<?php

namespace App\Repositories\Booking;

use Exception;

use App\Models\Booking;

class GetAllBookingRepository
{
    public function getAllBooking()
    {
        try{
            $bookings = Booking::join('shops', 'bookings.shop_id', '=', 'shops.id')
                ->select('bookings.*', 'shops.namaToko', 'shops.lokasiToko')
                ->orderBy('shops.namaToko', 'asc')
                ->get();

            $bookingDTOs = [];

            foreach ($bookings as $booking) {
                $bookingDTO = [
                    'id' => $booking->id,
                    'namaPemesan' => $booking->namaPemesan,
                    'nomorMeja' => $booking->nomorMeja,
                    'telpPemesan' => $booking->telpPemesan,
                    'jamAmbil' => $booking->jamAmbil,
                    'statusAmbil' => $booking->statusAmbil,
                    'shop_id' => $booking->shop_id,
                    'shop_namaToko' => $booking->namaToko,
                    'shop_lokasiToko' => $booking->lokasiToko
                ];

                array_push($bookingDTOs, $bookingDTO);
            }

            return $bookingDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
