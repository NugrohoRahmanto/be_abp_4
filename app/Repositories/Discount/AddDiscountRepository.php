<?php

namespace App\Repositories\Discount;

use Exception;
use App\DTO\DiscountDTO;

use App\Models\Discount;

class AddDiscountRepository {
    /**
     * Register new Discount
     * @param DiscountDTO $DiscountDTO
     * @return DiscountDTO
     */
    public function AddDiscount(DiscountDTO $discountDTO) {
        try {
            $discount = new Discount();
            $discount->kodeDiskon = $discountDTO->kodeDiskon;
            $discount->persentaseDiskon = $discountDTO->persentaseDiskon;
            $discount->quantityDiskon = $discountDTO->quantityDiskon;
            $discount->deskripsiDiskon = $discountDTO->deskripsiDiskon;
            $discount->shop_id = $discountDTO->shop_id;
            $discount->save();

            return $discountDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
