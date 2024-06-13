<?php

namespace App\Repositories\Shop;

use Exception;
use App\DTO\ShopDTO;

use App\Models\Shop;

class AddShopRepository {
    /**
     * Register new Shop
     * @param ShopDTO $ShopDTO
     * @return ShopDTO
     */
    public function AddShop(ShopDTO $shopDTO) {
        try {
            $shop = new Shop();
            $shop->namaToko = $shopDTO->namaToko;
            $shop->nomorToko = $shopDTO->nomorToko;
            $shop->lokasiToko = $shopDTO->lokasiToko;
            $shop->user_id = $shopDTO->user_id;
            $shop->save();

            return $shopDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
