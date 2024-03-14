<?php

namespace App\Services\MenuCategory;

use Exception;
use Illuminate\Http\Request;

use App\DTO\MenuCategoryDTO;

use App\Repositories\MenuCategory\EditMenuCategoryRepository;

class EditMenuCategoryService {
    public function __construct(
        private EditMenuCategoryRepository $menuCategoryRepository
    ) {}

    /**
     * Edit MenuCategory
     * @param Request $request
     * @return MenuCategoryDTO
     */
    public function editMenuCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:menu_categories,id',
                'namaMenuKategori' => 'required'
            ]);

            $categoryDTO = new MenuCategoryDTO(
                id: $request->id,
                namaMenuKategori: $request->namaMenuKategori
            );

            $categoryDTO = $this->menuCategoryRepository->editMenuCategory($categoryDTO);

            return $categoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
