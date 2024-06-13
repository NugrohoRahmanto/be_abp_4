<?php

namespace App\Services\Menu;

use Exception;
use App\DTO\ShopOrderDTO;
use Illuminate\Http\Request;

use App\Repositories\Menu\DonePaidedMenuByShopRepository;

class DonePaidedMenuByShopService {
    public function __construct(
        private DonePaidedMenuByShopRepository $menuRepository
    ) {}

    /**
     * Get all Menu
     * @return array
     */
    public function donePaidedMenuByShop(Request $request) {
        try {
            request()->validate([
                'booking_id' => 'required|exists:bookings,id',
                'menu_id' => 'required|exists:menus,id',
                'shop_id' => 'required|exists:shops,id'
            ]);

            $shopOrderDTO = new ShopOrderDTO(
                booking_id: $request->booking_id,
                menu_id: $request->menu_id,
                shop_id: $request->shop_id,
            );

            return $this->menuRepository->donePaidedMenuByShop($shopOrderDTO);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
