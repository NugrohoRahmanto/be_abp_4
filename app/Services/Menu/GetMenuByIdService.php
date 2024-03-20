<?php

namespace App\Services\Menu;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Menu\GetMenuByIdRepository;

class GetMenuByIdService {
    public function __construct(
        private GetMenuByIdRepository $menuByIdRepository
    ) {}

    /**
     * Get  Menu
     * @return array
     */
    public function getMenuById(Request $request) {
        try {
            $request->validate([
                'shop_id' => 'required|exists:shops,id',
            ]);

            $shop_id = $request->shop_id;

            return $this->menuByIdRepository->getMenuById($shop_id);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
