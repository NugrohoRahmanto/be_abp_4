<?php

namespace App\Repositories\Menu;

use App\DTO\MenuDTO;
use Exception;

use App\Models\Menu;
use App\Models\ShopOrder;
use App\Models\Booking;

class GetAllPaidedMenuByShopRepository
{
    public function getAllPaidedMenuByShop(MenuDTO $menuDTO)
    {
        try{
            $shopOrders = ShopOrder::where('shop_id', $menuDTO->shop_id)
            ->get();

            $orderDetails = [];

            foreach ($shopOrders as $shopOrder) {
                $menu = Menu::find($shopOrder->menu_id);
                $booking = Booking::find($shopOrder->booking_id);

                $qtyShop = ShopOrder::where('menu_id', $shopOrder->menu_id)
                ->where('booking_id', $shopOrder->booking_id)
                ->select('banyakPesanan')
                ->get();

                if ($menu && $booking) {
                    $orderDetails[] = [
                        'menu' => $menu,
                        'quantity' => $qtyShop,
                        'booking' => $booking,
                    ];
                }
            }

            return $orderDetails;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
