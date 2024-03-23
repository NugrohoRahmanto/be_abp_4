<?php

namespace App\Services\Shop;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Shop\GetAllShopWithUserRepository;

class GetAllShopWithUserService {
    public function __construct(
        private GetAllShopWithUserRepository $shopRepository
    ) {}

    /**
     * Get all Shop with user name
     * @param Request $request
     * @return array ShopDTO, user name
     */
    public function getAllShopWithUser(Request $request) {
        try {
            return $this->shopRepository->getAllShopWithUserRepository($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
