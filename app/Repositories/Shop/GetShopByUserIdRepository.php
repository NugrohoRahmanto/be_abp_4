<?php

namespace App\Repositories\Shop;

use Exception;

use App\Models\Shop;

class GetShopByUserIdRepository
{
    public function getShopById($user_id)
    {
        try{
            $shops = Shop::join('users', 'shops.user_id', '=', 'users.id')
                        ->select('shops.*', 'users.fullName')
                        ->where('users.id', $user_id)
                        ->get();


            $shopDTOs = [];

            foreach ($shops as $shop) {
                $shopDTO = [
                    'id' => $shop->id,
                    'namaToko' => $shop->namaToko,
                    'nomorToko' => $shop->nomorToko,
                    'lokasiToko' => $shop->lokasiToko,
                    'user_fullName' => $shop->fullName,
                    'image' => $shop->image,
                ];

                array_push($shopDTOs, $shopDTO);
            }

            return $shopDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
