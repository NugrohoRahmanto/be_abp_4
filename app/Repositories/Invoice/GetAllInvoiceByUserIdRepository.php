<?php

namespace App\Repositories\Invoice;

use App\DTO\InvoiceDTO;
use Exception;
use App\Models\Invoice;
use App\Models\Checkout;

class GetAllInvoiceByUserIdRepository
{
    public function getAllInvoiceRepository(InvoiceDTO $invoiceDTO)
    {
        try {
            $data = Invoice::join('bookings', 'invoices.booking_id', '=', 'bookings.id')
                ->select(
                    'invoices.*',
                    'bookings.nomorMeja',
                    'bookings.jamAmbil',
                    'bookings.totalHarga',
                    'bookings.statusAmbil',
                    'bookings.statusBayar',
                    'bookings.user_id as booking_user_id',
                )
                ->where('invoices.user_id', $invoiceDTO->getUserId())
                ->get();
        
            $invoiceDTO = [];
        
            foreach ($data as $item) {
                $invoiceDTO[] = [
                    'id' => $item->id,
                    'metodePembayaran' => $item->metodePembayaran,
                    'booking_id' => $item->booking_id,
                    'statusLengkap' => $item->statusLengkap,
                    'user_id' => $item->user_id,
                    'nomorMeja' => $item->nomorMeja,
                    'jamAmbil' => $item->jamAmbil,
                    'totalHarga' => $item->totalHarga,
                    'statusAmbil' => $item->statusAmbil,
                    'statusBayar' => $item->statusBayar,
                    'booking_user_id' => $item->booking_user_id,
                ];
            }
        
            return $invoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
