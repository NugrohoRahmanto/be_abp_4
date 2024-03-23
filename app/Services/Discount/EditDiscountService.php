<?php

namespace App\Services\Discount;

use Exception;
use Illuminate\Http\Request;

use App\DTO\DiscountDTO;

use App\Repositories\Discount\EditDiscountRepository;

class EditDiscountService {
    public function __construct(
        private EditDiscountRepository $discountRepository
    ) {}

    /**
     * Edit Discount
     * @param Request $request
     * @return DiscountDTO
     */
    public function editDiscount(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:discounts,id',
                'quantityDiskon' => 'required'
            ]);

            $discountDTO = new DiscountDTO(
                id: $request->id,
                kodeDiskon: null,
                persentaseDiskon: null,
                quantityDiskon: $request->quantityDiskon,
                deskripsiDiskon: null,
                shop_id: null
            );

            $discountDTO = $this->discountRepository->editDiscount($discountDTO);

            return $discountDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
