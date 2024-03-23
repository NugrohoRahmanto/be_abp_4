<?php

namespace App\Repositories\Shop;

use Exception;

use App\DTO\ShopDTO;
use App\Models\Shop;

class DeleteShopRepository {
    /**
     * Delete Shop
     * @param ShopDTO $ShopDTO
     * @return ShopDTO
     */
    public function deleteShop(ShopDTO $shopDTO) {
        try {
            $shop = Shop::findOrFail($shopDTO->id);
            $shop->delete();

            return $shop;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
