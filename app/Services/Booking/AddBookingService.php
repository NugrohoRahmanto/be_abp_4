<?php

namespace App\Services\Booking;

use Illuminate\Http\Request;

use App\DTO\BookingDTO;
use Exception;

use App\Repositories\Booking\AddBookingRepository;


class AddBookingService {
    public function __construct(
        private AddBookingRepository $addBookingRepository
    ) {}

    /**
     * Register new Booking
     * @param Request $request
     * @return BookingDTO
     */
    public function addBooking(Request $request) {
        try {
            $request->validate([
                'namaPemesan' => 'required',
                'nomorMeja' => 'required',
                'telpPemesan' => 'required',
                'jamAmbil' => 'required',
                'statusAmbil' => 'required',
                'shop_id' => 'required|exists:shops,id',
            ]);

            $bookingDTO = new BookingDTO(
                id : null,
                namaPemesan: $request->namaPemesan,
                nomorMeja: $request->nomorMeja,
                telpPemesan: $request->telpPemesan,
                jamAmbil: $request->jamAmbil,
                statusAmbil: $request->statusAmbil,
                shop_id: $request->shop_id,
            );

            $userResult = $this->addBookingRepository->addBooking($bookingDTO);

            return ([
                'namaPemesan' => $userResult->getNamaPemesan(),
                'nomorMeja' => $userResult->getNomorMeja(),
                'telpPemesan' => $userResult->getTelpPemesan(),
                'jamAmbil' => $userResult->getJamAmbil(),
                'statusAmbil' => $userResult->getStatusAmbil(),
                'shop_id' => $userResult->getShopId(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
