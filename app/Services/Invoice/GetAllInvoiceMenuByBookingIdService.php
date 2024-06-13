<?php

namespace App\Services\Invoice;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Invoice\GetAllInvoiceMenuByBookingIdRepository;

class GetAllInvoiceMenuByBookingIdService {
    public function __construct(
        private GetAllInvoiceMenuByBookingIdRepository $InvoiceRepository
    ) {}

    /**
     * Get all Invoice with Shop name
     * @param Request $request
     * @return array InvoiceDTO, Shop name
     */
    public function getAllInvoice(Request $request) {
        try {
            $invoice_id = $request->invoice_id;

            return $this->InvoiceRepository->getAllInvoiceRepository($invoice_id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
