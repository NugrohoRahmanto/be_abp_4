<?php

namespace App\Services\Discount;

use Exception;
use Illuminate\Http\Request;

use App\DTO\DiscountDTO;

use App\Repositories\Discount\DeleteDiscountRepository;

class DeleteDiscountService {
    public function __construct(
        private DeleteDiscountRepository $discountRepository
    ) {}

    /**
     * Delete Discount
     * @param Request $request
     * @return DiscountDTO
     */
    public function deleteDiscount(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:discounts,id',
            ]);

            $discountDTO = new DiscountDTO(
                id : $request->id
            );

            $discountDTO = $this->discountRepository->deleteDiscount($discountDTO);

            return $discountDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
