<?php

namespace App\Services\Shop;

use Illuminate\Http\Request;

use App\DTO\ShopDTO;
use Exception;

use App\Repositories\Shop\AddShopRepository;


class AddShopService {
    public function __construct(
        private AddShopRepository $addShopRepository
    ) {}

    /**
     * Register new Shop
     * @param Request $request
     * @return ShopDTO
     */
    public function addShop(Request $request) {
        try {
            $request->validate([
                'namaToko' => 'required|unique:shops',
                'nomorToko' => 'required|unique:shops',
                'user_id' => 'required|exists:users,id'
            ]);

            $shopDTO = new ShopDTO(
                id : null,
                namaToko: $request->namaToko,
                nomorToko : $request->nomorToko,
                user_id : $request->user_id
            );

            $shopResult = $this->addShopRepository->AddShop($shopDTO);

            return ([
                'namaToko' => $shopResult->getNamaToko(),
                'nomorToko' => $shopResult->getNomorToko()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
