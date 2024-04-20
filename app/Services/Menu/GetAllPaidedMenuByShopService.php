<?php

namespace App\Services\Menu;

use Exception;
use App\DTO\MenuDTO;
use Illuminate\Http\Request;

use App\Repositories\Menu\GetAllPaidedMenuByShopRepository;

class GetAllPaidedMenuByShopService {
    public function __construct(
        private GetAllPaidedMenuByShopRepository $menuRepository
    ) {}

    /**
     * Get all Menu
     * @return array
     */
    public function getAllPaidedMenuByShop(Request $request) {
        try {
            request()->validate([
                'shop_id' => 'required|exists:shops,id'
            ]);

            $menuDTO = new MenuDTO(
                shop_id: $request->shop_id
            );

            return $this->menuRepository->getAllPaidedMenuByShop($menuDTO);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
