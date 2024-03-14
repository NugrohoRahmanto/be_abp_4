<?php

namespace App\Repositories\Shop;

use Exception;

use App\DTO\ShopDTO;
use App\Models\Shop;

class EditShopRepository {
    /**
     * Edit Shop
     * @param ShopDTO $ShopDTO
     * @return ShopDTO
     */
    public function editShop(ShopDTO $shopDTO) {
        try {
            $shop = Shop::find($shopDTO->id);
            $shop->namaToko = $shopDTO->namaToko;
            $shop->nomorToko = $shopDTO->nomorToko;
            if($shopDTO->user_id != null) {
                $shop->user_id = $shopDTO->user_id;
            }
            $shop->save();

            return $shop;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
