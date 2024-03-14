<?php

namespace App\Repositories\MenuCategory;

use Exception;

use App\DTO\MenuCategoryDTO;
use App\Models\MenuCategory;

class DeleteMenuCategoryRepository {
    /**
     * Delete MenuCategory
     * @param MenuCategoryDTO $MenuCategoryDTO
     * @return MenuCategoryDTO
     */
    public function deleteMenuCategory(MenuCategoryDTO $menuCategoryDTO) {
        try {
            $category = MenuCategory::findOrFail($menuCategoryDTO->id);
            $category->delete();

            return $category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
