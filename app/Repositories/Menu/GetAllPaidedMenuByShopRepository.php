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
            $shopOrders = ShopOrder::where('shop_id', $menuDTO->shop_id)->get();
            $orderDetails = [];

            foreach ($shopOrders as $shopOrder) {
                $menuId = $shopOrder->menu_id;
                $bookingId = $shopOrder->booking_id;

                if (!isset($orderDetails[$menuId])) {
                    $orderDetails[$menuId] = [
                        'menu' => Menu::find($menuId),
                        'bookings' => [],
                    ];
                }

                $orderDetails[$menuId]['bookings'][] = Booking::find($bookingId);
            }

            return $orderDetails;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
