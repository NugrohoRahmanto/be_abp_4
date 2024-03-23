<?php

namespace App\Repositories\Menu;

use Exception;
use App\DTO\MenuDTO;

use App\Models\Menu;

class AddMenuRepository {
    /**
     * Register new Menu
     * @param MenuDTO $MenuDTO
     * @return MenuDTO
     */
    public function addMenu(MenuDTO $menuDTO) {
        try {
            $menu = new Menu();
            $menu->namaMenu = $menuDTO->namaMenu;
            $menu->hargaMenu = $menuDTO->hargaMenu;
            $menu->stokMenu = $menuDTO->stokMenu;
            $menu->deskripsiMenu = $menuDTO->deskripsiMenu;
            $menu->shop_id = $menuDTO->shop_id;
            $menu->save();

            return $menuDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
