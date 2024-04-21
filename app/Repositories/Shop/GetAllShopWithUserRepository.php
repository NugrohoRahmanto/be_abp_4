<?php

namespace App\Repositories\Shop;

use Exception;

use App\Models\Shop;

class GetAllShopWithUserRepository
{
    public function getAllShopWithUserRepository()
    {
        try{
            $shops = Shop::join('users', 'shops.user_id', '=', 'users.id')
                ->select('shops.*', 'users.fullName')->get();

            $shopDTOs = [];

            foreach ($shops as $shop) {
                $shopDTO = [
                    'id' => $shop->id,
                    'namaToko' => $shop->namaToko,
                    'nomorToko' => $shop->nomorToko,
                    'lokasiToko' => $shop->lokasiToko,
                    'user_id' => $shop->user_id,
                    'user_fullName' => $shop->fullName,
                ];

                array_push($shopDTOs, $shopDTO);
            }

            return $shopDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
