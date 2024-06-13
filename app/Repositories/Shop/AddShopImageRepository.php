<?php

namespace App\Repositories\Shop;

use Exception;
use App\DTO\ShopDTO;

use App\Models\Shop;

class AddShopImageRepository {
    /**
     * Register new Shop
     * @param ShopDTO $ShopDTO
     * @return ShopDTO
     */
    public function AddShopImage(ShopDTO $shopDTO) {
        try {
            $shop = Shop::find($shopDTO->getId());
            $shop->image = $shopDTO->getImage();
            $shop->save();

            return $shopDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
