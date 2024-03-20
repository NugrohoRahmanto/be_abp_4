<?php

namespace App\Services\Menu;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Menu\GetAllMenuWithShopNameRepository;

class GetAllMenuWithShopNameService {
    public function __construct(
        private GetAllMenuWithShopNameRepository $menuRepository
    ) {}

    /**
     * Get all Menu
     * @return array
     */
    public function getAllMenuWithShopName(Request $request) {
        try {
            return $this->menuRepository->getAllMenuWithShopName($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
