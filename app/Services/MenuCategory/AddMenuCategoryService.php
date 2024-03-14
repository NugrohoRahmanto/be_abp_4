<?php

namespace App\Services\MenuCategory;

use Illuminate\Http\Request;

use App\DTO\MenuCategoryDTO;
use Exception;

use App\Repositories\MenuCategory\AddMenuCategoryRepository;


class AddMenuCategoryService {
    public function __construct(
        private AddMenuCategoryRepository $addMenuCategoryRepository
    ) {}

    /**
     * Register new MenuCategory
     * @param Request $request
     * @return MenuCategoryDTO
     */
    public function addMenuCategory(Request $request) {
        try {
            $request->validate([
                'namaMenuKategori' => 'required'
            ]);

            $categoryDTO = new MenuCategoryDTO(
                id : null,
                namaMenuKategori: $request->namaMenuKategori
            );

            $userResult = $this->addMenuCategoryRepository->addMenuCategory($categoryDTO);

            return ([
                'namaMenuKategori' => $userResult->getnamaMenuKategori()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
