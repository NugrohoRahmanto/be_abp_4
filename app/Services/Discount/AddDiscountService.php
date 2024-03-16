<?php

namespace App\Services\Discount;

use Illuminate\Http\Request;

use App\DTO\DiscountDTO;
use Exception;

use App\Repositories\Discount\AddDiscountRepository;


class AddDiscountService {
    public function __construct(
        private AddDiscountRepository $addDiscountRepository
    ) {}

    /**
     * Register new Discount
     * @param Request $request
     * @return DiscountDTO
     */
    public function addDiscount(Request $request) {
        try {
            $request->validate([
                'kodeDiskon' => 'required|unique:discounts',
                'persentaseDiskon' => 'required',
                'quantityDiskon' => 'required',
                'shop_id' => 'required|exists:shops,id'
            ]);

            $discountDTO = new DiscountDTO(
                id : null,
                kodeDiskon: $request->kodeDiskon,
                persentaseDiskon : $request->persentaseDiskon,
                quantityDiskon : $request->quantityDiskon,
                deskripsiDiskon : null,
                shop_id : $request->shop_id
            );

            $discountResult = $this->addDiscountRepository->AddDiscount($discountDTO);

            return ([
                'kodeDiskon' => $discountResult->getKodeDiskon(),
                'persentaseDiskon' => $discountResult->getPersentaseDiskon(),
                'quantityDiskon' => $discountResult->getQuantityDiskon()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
