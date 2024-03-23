<?php

namespace App\Services\ChooseCategory;

use Exception;
use App\Repositories\ChooseCategory\DeleteChooseCategoryRepository;
use Illuminate\Http\Request;

class DeleteChooseCategoryService
{
    public function __construct(
        private DeleteChooseCategoryRepository $chooseCategoryRepository,
    ) {}

    public function deleteChooseCategory(Request $request)
    {
        try {
            $menuId = $request->menuId;
            $categoryId = $request->categoryId;

            $result = $this->chooseCategoryRepository->deleteChooseCategory($menuId, $categoryId);
        
            return $result;;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
