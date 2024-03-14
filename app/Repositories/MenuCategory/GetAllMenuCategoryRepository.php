<?php

namespace App\Repositories\MenuCategory;

use Exception;

use App\Models\MenuCategory;
use App\DTO\MenuCategoryDTO;

class GetAllMenuCategoryRepository
{
    public function getAllMenuCategory()
    {
        try{
            $categories = MenuCategory::all();

            $categoryDTOs = [];
            foreach ($categories as $category) {
                $categoryDTO = new MenuCategoryDTO(
                    id: $category->id,
                    namaMenuKategori: $category->namaMenuKategori
                );

                array_push($categoryDTOs, $categoryDTO);
            }

            return $categoryDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
