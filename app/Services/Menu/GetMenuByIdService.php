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
            return $this->menuByIdRepository->getMenuById($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
