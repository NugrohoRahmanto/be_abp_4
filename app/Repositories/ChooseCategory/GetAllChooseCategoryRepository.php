<?php

namespace App\Repositories\ChooseCategory;

use App\DTO\MenuDTO;
use Exception;
use App\Models\PilihCategory;
use App\Models\MenuCategory;
use App\Models\Menu;

class GetAllChooseCategoryRepository
{
    public function getAllChooseCategory($menuId)
    {
        try {
            // Mengambil data dari tabel Menu berdasarkan ID
            $menu = Menu::find($menuId);
            if (!$menu) {
                throw new Exception('Menu not found');
            }

            $menuDTO = new MenuDTO(
                id : $menu->id,
                namaMenu : $menu->namaMenu,
                hargaMenu : $menu->hargaMenu,
                stokMenu : $menu->stokMenu,
                deskripsiMenu : $menu->deskripsiMenu
            );

            // Mengambil data dari tabel Pilih Category berdasarkan ID Menu
            $pilihCategories = PilihCategory::where('idMenu', $menuId)->get();
            $chooseCategories = collect();

            // Iterasi melalui setiap entri pilih category untuk mendapatkan detailnya
            foreach ($pilihCategories as $pilihCategory) {
                $category = MenuCategory::select('id', 'namaMenuKategori')->find($pilihCategory->idCategory);

                if ($category) {
                    $chooseCategories->push($category);
                }
            }

            return [
                'Menu' => $menuDTO,
                'PilihCategory' => $chooseCategories,
            ];

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
