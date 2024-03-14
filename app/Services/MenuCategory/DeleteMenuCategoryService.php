<?php

namespace App\Services\MenuCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\MenuCategoryDTO;

use App\Repositories\MenuCategory\DeleteMenuCategoryRepository;

class DeleteMenuCategoryService {
    public function __construct(
        private DeleteMenuCategoryRepository $menuCategoryRepository
    ) {}

    /**
     * Delete MenuCategory
     * @param Request $request
     * @return MenuCategoryDTO
     */
    public function deleteMenuCategory(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:menu_categories,id',
            ]);

            $categoryDTO = new MenuCategoryDTO(
                id : $request->id
            );

            $categoryDTO = $this->menuCategoryRepository->deleteMenuCategory($categoryDTO);

            return $categoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
