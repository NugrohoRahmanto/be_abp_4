<?php

namespace App\Repositories\MenuCategory;

use Exception;

use App\DTO\MenuCategoryDTO;
use App\Models\MenuCategory;

class EditMenuCategoryRepository {
    /**
     * Edit MenuCategory
     * @param MenuCategoryDTO $MenuCategoryDTO
     * @return MenuCategoryDTO
     */
    public function editMenuCategory(MenuCategoryDTO $menuCategoryDTO) {
        try {
            $category = MenuCategory::find($menuCategoryDTO->id);
            $category->namaMenuKategori = $menuCategoryDTO->namaMenuKategori;
            $category->save();

            return $category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
