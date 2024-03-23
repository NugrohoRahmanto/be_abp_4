<?php

namespace App\Services\ChooseCategory;

use Exception;
use App\Repositories\ChooseCategory\GetAllChooseCategoryRepository;

class GetAllChooseCategoryService
{
    public function __construct(
        private GetAllChooseCategoryRepository $chooseCategoryRepository,
    ) {}

    public function getAllChooseCategory($menuId)
    {
        try {
            $result = $this->chooseCategoryRepository->getAllChooseCategory($menuId);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
