<?php

namespace App\Services\Invoice;

use Exception;
use Illuminate\Http\Request;

use App\DTO\InvoiceDTO;

use App\Repositories\Invoice\DeleteInvoiceRepository;

class DeleteInvoiceService {
    public function __construct(
        private DeleteInvoiceRepository $invoiceRepository
    ) {}

    /**
     * Delete Invoice
     * @param Request $request
     * @return InvoiceDTO
     */
public function deleteInvoice(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:invoices,id'
            ]);

            $invoiceDTO = new InvoiceDTO(
                id : $request->id,
            );

            $invoiceDTO = $this->invoiceRepository->deleteInvoice($invoiceDTO);

            return $invoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
