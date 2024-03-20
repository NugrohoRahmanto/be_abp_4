<?php

namespace App\Repositories\Discount;

use Exception;

use App\DTO\DiscountDTO;
use App\Models\Discount;

class DeleteDiscountRepository {
    /**
     * Delete Discount
     * @param DiscountDTO $DiscountDTO
     * @return DiscountDTO
     */
    public function deleteDiscount(DiscountDTO $discountDTO) {
        try {
            $discount = Discount::findOrFail($discountDTO->id);
            $discount->delete();

            return $discount;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
