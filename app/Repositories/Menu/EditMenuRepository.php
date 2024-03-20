<?php

namespace App\Repositories\Menu;

use Exception;

use App\DTO\MenuDTO;
use App\Models\Menu;

class EditMenuRepository {
    /**
     * Edit Menu
     * @param MenuDTO $MenuDTO
     * @return MenuDTO
     */
    public function editMenu(MenuDTO $menuDTO) {
        try {
            $menu = Menu::find($menuDTO->id);
            $menu->namaMenu = $menuDTO->namaMenu;
            $menu->hargaMenu = $menuDTO->hargaMenu;
            $menu->deskripsiMenu = $menuDTO->deskripsiMenu;
            $menu->save();

            return $menu;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
