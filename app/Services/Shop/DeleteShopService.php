<?php

namespace App\Services\Shop;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ShopDTO;

use App\Repositories\Shop\DeleteShopRepository;

class DeleteShopService {
    public function __construct(
        private DeleteShopRepository $shopRepository
    ) {}

    /**
     * Delete Shop
     * @param Request $request
     * @return ShopDTO
     */
    public function deleteShop(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:shops,id',
            ]);

            $shopDTO = new ShopDTO(
                id : $request->id
            );

            $shopDTO = $this->shopRepository->deleteShop($shopDTO);

            return $shopDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
