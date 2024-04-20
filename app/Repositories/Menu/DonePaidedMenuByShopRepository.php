<?php

namespace App\Repositories\Menu;

use App\DTO\ShopOrderDTO;
use Exception;

use App\Models\ShopOrder;
use App\Models\Invoice;

class DonePaidedMenuByShopRepository
{
    public function donePaidedMenuByShop(ShopOrderDTO $shopOrderDTO)
    {
        try{
            $shopOrder = ShopOrder::where('booking_id', $shopOrderDTO->getBookingId())
                        ->where('shop_id', $shopOrderDTO->getShopId())
                        ->where('menu_id', $shopOrderDTO->getMenuId())
                        ->first();

            if ($shopOrder) {
                $shopOrder->update(['statusMasak' => 'Selesai']);
            }else{
                return false;
            }

            $completedOrders = ShopOrder::where('booking_id', $shopOrderDTO->getBookingId())
                ->where('shop_id', $shopOrderDTO->getShopId())
                ->where('statusMasak', '<>', 'Selesai')
                ->count();

            if ($completedOrders === 0) {
                Invoice::where('booking_id', $shopOrderDTO->getBookingId())
                    ->update(['statusLengkap' => 'Selesai']);
            }

            return true;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
