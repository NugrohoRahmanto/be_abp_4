<?php

namespace App\Services\ChooseCategory;

use Exception;
use App\Repositories\ChooseCategory\AddChooseCategoryRepository;
use Illuminate\Http\Request;

class AddChooseCategoryService
{
    public function __construct(
        private AddChooseCategoryRepository $chooseCategoryRepository,
    ) {}

    public function addChooseCategory(Request $request)
    {
        try {
            $menuId = $request->menuId;
            $categoryId = $request->categoryId;

            if ($categoryId == 0) {
                throw new Exception('Please select menu category!');
            }else{
                $result = $this->chooseCategoryRepository->addChooseCategory($menuId, $categoryId);
            }

            return $result;;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
