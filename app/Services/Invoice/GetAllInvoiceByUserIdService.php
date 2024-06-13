<?php

namespace App\Services\Invoice;

use Exception;
use App\DTO\InvoiceDTO;
use Illuminate\Http\Request;

use App\Repositories\Invoice\GetAllInvoiceByUserIdRepository;

class GetAllInvoiceByUserIdService {
    public function __construct(
        private GetAllInvoiceByUserIdRepository $InvoiceRepository
    ) {}

    /**
     * Get all Invoice with Shop name
     * @param Request $request
     * @return array InvoiceDTO, Shop name
     */
    public function getAllInvoice(Request $request) {
        try {
            request()->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $invoiceDTO = new InvoiceDTO(
                user_id : $request->user_id
            );

            return $this->InvoiceRepository->getAllInvoiceRepository($invoiceDTO);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
