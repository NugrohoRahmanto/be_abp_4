<?php

namespace App\Repositories\ChooseCategory;

use Exception;
use App\Models\PilihCategory;

class DeleteChooseCategoryRepository
{
    public function deleteChooseCategory($idMenu, $idCategory)
    {
        try {
            $relation = PilihCategory::where('idMenu', $idMenu)
                ->where('idCategory', $idCategory)
                ->first();

            if (!$relation) {
                throw new Exception('Menu-Category relation not found');
            }else{
                PilihCategory::where('idMenu', $idMenu)
                ->where('idCategory', $idCategory)
                ->delete();
            }

            return $relation;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
