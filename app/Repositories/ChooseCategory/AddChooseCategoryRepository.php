<?php

namespace App\Repositories\ChooseCategory;

use App\DTO\ChooseDTO;
use App\Models\MenuCategory;
use Exception;
use App\Models\Menu;
use App\Models\PilihCategory;

class AddChooseCategoryRepository
{
    public function addChooseCategory($idMenu, $idCategory)
    {
        try {
            $menu = Menu::find($idMenu);
            $category = MenuCategory::find($idCategory);

            if (!$menu || !$category) {
                throw new Exception('Menu or Category not found');
            }

            // Cek apakah relasi menu dan category sudah ada
            $existingRelation = PilihCategory::where('idMenu', $idMenu)
                ->where('idCategory', $idCategory)
                ->first();

            if ($existingRelation) {
                throw new Exception('This menu and category relation already exists');
            }

            // Tambahkan relasi menu dan category ke tabel pilihCategory
            $pilih = new PilihCategory();
            $pilih->idMenu = $idMenu;
            $pilih->idCategory = $idCategory;
            $pilih->save();

            $pilihCategory = new ChooseDTO(
                idMenu : $menu->id,
                idCategory : $category->id
            );

            return $pilihCategory;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
