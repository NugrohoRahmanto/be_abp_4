<?php

namespace App\Repositories\Discount;

use Exception;

use App\DTO\DiscountDTO;
use App\Models\Discount;

class EditDiscountRepository {
    /**
     * Edit Discount
     * @param DiscountDTO $DiscountDTO
     * @return DiscountDTO
     */
    public function editDiscount(DiscountDTO $discountDTO) {
        try {
            $discount = Discount::find($discountDTO->id);
            $discount->quantityDiskon += $discountDTO->quantityDiskon;
            $discount->save();

            return $discount;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
