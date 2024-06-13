<?php

namespace App\Services\Shop;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Shop\GetShopByUserIdRepository;

class GetShopByUserIdService {
    public function __construct(
        private GetShopByUserIdRepository $shopByIdRepository
    ) {}

    /**
     * Get  Shop
     * @return array
     */
    public function getShopById(Request $request) {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id = $request->user_id;

            return $this->shopByIdRepository->getShopById($user_id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
