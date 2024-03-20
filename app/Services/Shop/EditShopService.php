<?php

namespace App\Services\Shop;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ShopDTO;

use App\Repositories\Shop\EditShopRepository;

class EditShopService {
    public function __construct(
        private EditShopRepository $shopRepository
    ) {}

    /**
     * Edit Shop
     * @param Request $request
     * @return ShopDTO
     */
    public function editShop(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:shops,id',
                'namaToko' => 'required',
                'nomorToko' => 'required',
                'user_id' => 'exists:users,id'
            ]);

            $shopDTO = new ShopDTO(
                id: $request->id,
                namaToko: $request->namaToko,
                nomorToko: $request->nomorToko,
                user_id: $request->user_id
            );

            $shopDTO = $this->shopRepository->editShop($shopDTO);

            return $shopDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
