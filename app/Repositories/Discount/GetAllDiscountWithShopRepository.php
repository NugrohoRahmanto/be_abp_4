<?php

namespace App\Repositories\Discount;

use Exception;

use App\Models\Discount;

class GetAllDiscountWithShopRepository
{
    public function getAllDiscountWithShopRepository()
    {
        try{
            $discounts = Discount::join('shops', 'discounts.shop_id', '=', 'shops.id')
                ->select('discounts.*', 'shops.namaToko')->get();

            $discountDTOs = [];

            foreach ($discounts as $discount) {
                $discountDTO = [
                    'id' => $discount->id,
                    'kodeDiskon' => $discount->kodeDiskon,
                    'persentaseDiskon' => $discount->persentaseDiskon,
                    'quantityDiskon' => $discount->quantityDiskon,
                    'deskripsiDiskon' => $discount->deskripsiDiskon,
                    'shop_id' => $discount->user_id,
                    'shop_namaToko' => $discount->namaToko
                ];

                array_push($discountDTOs, $discountDTO);
            }

            return $discountDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
