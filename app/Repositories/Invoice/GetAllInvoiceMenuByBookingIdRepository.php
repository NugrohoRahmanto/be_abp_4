<?php

namespace App\Repositories\Invoice;

use Exception;
use App\Models\Invoice;
use App\Models\Checkout;

class GetAllInvoiceMenuByBookingIdRepository
{
    public function getAllInvoiceRepository($invoice_id)
    {
        try {
            $invoice = Invoice::with(['booking.user'])->find($invoice_id);

            if (!$invoice || !$invoice->booking) {
                throw new Exception('Invoice or Booking not found');
            }

            $invoiceDTO = [
                'user' => null,
                'menus' => []
            ];

            if ($invoice->booking->user) {
                $invoiceDTO['user'] = [
                    'user_id' => $invoice->booking->user->id,
                    'user_nickname' => $invoice->booking->user->nickname,
                    'user_fullName' => $invoice->booking->user->fullName,
                    'user_phoneNumber' => $invoice->booking->user->phoneNumber,
                ];
            }

            $menus = Checkout::join('menus', 'checkouts.idMenu', '=', 'menus.id')
                            ->select('menus.id', 'menus.namaMenu', 'menus.hargaMenu', 'checkouts.quantity')
                            ->where('checkouts.idBooking', $invoice->booking->id)
                            ->get();

            foreach ($menus as $menu) {
                $invoiceDTO['menus'][] = [
                    'id' => $menu->id,
                    'namaMenu' => $menu->namaMenu,
                    'hargaMenu' => $menu->hargaMenu,
                    'quantity' => $menu->quantity
                ];
            }

            return $invoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
