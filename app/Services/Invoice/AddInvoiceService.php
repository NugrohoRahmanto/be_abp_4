<?php

namespace App\Services\Invoice;

use App\DTO\InvoiceDTO;
use Exception;
use Illuminate\Http\Request;

use App\Repositories\Invoice\AddInvoiceRepository;

class AddInvoiceService {
    public function __construct(
        private AddInvoiceRepository $InvoiceRepository
    ) {}

    /**
     * Get all Invoice with Shop name
     * @param Request $request
     * @return array InvoiceDTO, Shop name
     */
    public function addInvoice(Request $request) {
        try {
            $request->validate([
                'metodePembayaran' => 'required',
                'booking_id' => 'exists:bookings,id',
            ]);

            $invoiceDTO = new InvoiceDTO(
                id : null,
                statusLengkap: "Belum Lengkap",
                metodePembayaran: $request->metodePembayaran,
                booking_id: $request->booking_id,
            );

            return $this->InvoiceRepository->addInvoiceRepository($request, $invoiceDTO);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
