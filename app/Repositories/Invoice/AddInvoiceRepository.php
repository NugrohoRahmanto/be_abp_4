<?php

namespace App\Repositories\Invoice;

use Exception;
use App\DTO\InvoiceDTO;
use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\Checkout;
use App\Models\ShopOrder;
use App\Models\Booking;
use App\Models\Menu;

use Illuminate\Support\Facades\DB;

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
            $invoice->user_id = $invoiceDTO->user_id;
            $invoice->save();
            
            $checkouts = DB::table('checkouts')
            ->join('menus', 'checkouts.idMenu', '=', 'menus.id')
            ->where('checkouts.idBooking', '=', $invoiceDTO->getBookingId())
            ->select('checkouts.quantity', 'checkouts.idBooking', 'checkouts.idMenu', 'menus.shop_id', 'menus.hargaMenu', 'menus.namaMenu')
            ->get();

            $shopOrdersData = [];
            foreach ($checkouts as $checkout) {
                $shopOrderData = [
                    'booking_id' => $checkout->idBooking,
                    'shop_id' => $checkout->shop_id,
                    'menu_id' => $checkout->idMenu,
                    'statusMasak' => 'Proses',
                    'banyakPesanan' => $checkout->quantity,
                    'namaMenu' => $checkout->namaMenu,
                ];
                $shopOrdersData[] = $shopOrderData;
            }

            foreach ($shopOrdersData as $shopOrderData) {
                $menu = Menu::find($shopOrderData['menu_id']);
                if (!$menu) {
                    $inv = Invoice::latest('id')->first();
                    $invLama = Invoice::find($inv->id);
                    $invLama->delete();
                    throw new Exception("Menu {$shopOrderData['namaMenu']} not found.");
                }

                if ($menu->stokMenu < $shopOrderData['banyakPesanan']) {
                    $inv = Invoice::latest('id')->first();
                    $invLama = Invoice::find($inv->id);
                    $invLama->delete();
                    throw new Exception("Insufficient stock for menu {$shopOrderData['namaMenu']}.");
                }                

                $menu->stokMenu -= $shopOrderData['banyakPesanan'];
                $menu->save();

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
            
            $inv = Invoice::latest('id')->first();
            $invLama = Invoice::find($inv->id);

            $invLama->user_id = $getUser->id;
            $addNewBooking = $this->addBookingService->addBooking($request, $getUser->id);
            $invLama->save();

            return $invoiceDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
