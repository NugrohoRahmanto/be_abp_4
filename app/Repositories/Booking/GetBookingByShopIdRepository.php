<?php

namespace App\Repositories\Booking;

use Exception;

use App\Models\Booking;

class GetBookingByShopIdRepository
{
    public function getBookingById($shop_id)
    {
        try{
            $bookings = Booking::join('shops', 'bookings.shop_id', '=', 'shops.id')
                ->select('bookings.*', 'shops.namaToko', 'shops.nomorToko', 'shops.lokasiToko')
                ->where('bookings.shop_id', $shop_id)
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
                    'shop_namaToko' => $booking->namaToko,
                    'shop_nomorToko' => $booking->nomorToko,
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
