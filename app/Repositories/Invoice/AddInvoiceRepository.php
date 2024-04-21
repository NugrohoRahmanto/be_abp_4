<?php

namespace App\Repositories\Invoice;

use Exception;
use App\DTO\InvoiceDTO;
use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\Checkout;
use App\Models\ShopOrder;
use App\Models\Booking;

use App\Services\Auth\GetUserInfoService;
use App\Services\Booking\AddBookingService;

class AddInvoiceRepository {
    public function __construct(
        private GetUserInfoService $getUserInfoService,
        private AddBookingService $addBookingService
    ) {}
    /**
     * Register new Invoice
     * @param InvoiceDTO $InvoiceDTO
     * @return InvoiceDTO
     */
    public function addInvoiceRepository(Request $request, InvoiceDTO $invoiceDTO) {
        try {
            $invoice = new Invoice();
            $invoice->metodePembayaran = $invoiceDTO->metodePembayaran;
            $invoice->booking_id = $invoiceDTO->booking_id;
            $invoice->save();

            $checkouts = Checkout::join('menus', 'checkouts.idMenu', '=', 'menus.id')
            ->where('checkouts.idBooking', $invoiceDTO->booking_id)
            ->get(['checkouts.quantity', 'checkouts.idBooking', 'checkouts.idMenu' ,'menus.shop_id', 'menus.hargaMenu']);

            $shopOrdersData = [];
            foreach ($checkouts as $checkout) {
                if (!isset($shopOrdersData[$checkout->shop_id])) {
                    $shopOrdersData[$checkout->shop_id] = [
                        'booking_id' => $checkout->idBooking,
                        'shop_id' => $checkout->shop_id,
                        'menu_id' => $checkout->idMenu,
                        'statusMasak' => 'Proses',
                        'banyakPesanan' => 0
                    ];
                }
                $shopOrdersData[$checkout->shop_id]['banyakPesanan'] += $checkout->quantity;
            }

            foreach ($shopOrdersData as $shopOrderData) {
                $SO = new ShopOrder();
                $SO->booking_id = $shopOrderData['booking_id'];
                $SO->shop_id = $shopOrderData['shop_id'];
                $SO->menu_id = $shopOrderData['menu_id'];
                $SO->banyakPesanan = $shopOrderData['banyakPesanan'];
                $SO->statusMasak = 'Proses';
                $SO->save();
            }

            $selesaiBooking = Booking::find($invoiceDTO->booking_id);
            $selesaiBooking->statusSelesai = 'Selesai';
            $selesaiBooking->save();

            $getUser = $this->getUserInfoService->getUserInfo($request);
            $addNewBooking = $this->addBookingService->addBooking($request, $getUser->id);

            return $invoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
