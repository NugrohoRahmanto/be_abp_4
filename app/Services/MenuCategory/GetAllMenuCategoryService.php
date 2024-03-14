<?php

namespace App\Services\MenuCategory;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\MenuCategory\GetAllMenuCategoryRepository;

class GetAllMenuCategoryService {
    public function __construct(
        private GetAllMenuCategoryRepository $menuCategoryRepository
    ) {}

    /**
     * Get all MenuCategory
     * @return array
     */
    public function getAllMenuCategory(Request $request) {
        try {
            return $this->menuCategoryRepository->getAllMenuCategory($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
