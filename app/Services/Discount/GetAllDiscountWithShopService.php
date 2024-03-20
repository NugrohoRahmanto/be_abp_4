<?php

namespace App\Services\Discount;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Discount\GetAllDiscountWithShopRepository;

class GetAllDiscountWithShopService {
    public function __construct(
        private GetAllDiscountWithShopRepository $discountRepository
    ) {}

    /**
     * Get all Discount with Shop name
     * @param Request $request
     * @return array DiscountDTO, Shop name
     */
    public function getAllDiscountWithShop(Request $request) {
        try {
            return $this->discountRepository->getAllDiscountWithShopRepository($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
