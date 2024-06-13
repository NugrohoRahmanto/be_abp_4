<?php

namespace App\Repositories\Invoice;

use Exception;

use App\DTO\InvoiceDTO;
use App\Models\Invoice;

class DeleteInvoiceRepository {
    /**
     * Delete Invoice
     * @param InvoiceDTO $InvoiceDTO
     * @return InvoiceDTO
     */
    public function deleteInvoice(InvoiceDTO $invoiceDTO) {
        try {
            $invoice = Invoice::findOrFail($invoiceDTO->id);
            $invoice->delete();

            return $invoice;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
