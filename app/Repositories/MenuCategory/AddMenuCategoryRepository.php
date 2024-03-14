<?php

namespace App\Repositories\MenuCategory;

use Exception;
use App\DTO\MenuCategoryDTO;

use App\Models\MenuCategory;

class AddMenuCategoryRepository {
    /**
     * Register new MenuCategory
     * @param MenuCategoryDTO $MenuCategoryDTO
     * @return MenuCategoryDTO
     */
    public function addMenuCategory(MenuCategoryDTO $MenuCategoryDTO) {
        try {
            $category = new MenuCategory();
            $category->namaMenuKategori = $MenuCategoryDTO->namaMenuKategori;
            $category->save();

            return $MenuCategoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
