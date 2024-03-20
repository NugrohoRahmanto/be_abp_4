<?php

namespace App\Repositories\Menu;

use Exception;

use App\DTO\MenuDTO;
use App\Models\Menu;

class DeleteMenuRepository {
    /**
     * Delete Menu
     * @param MenuDTO $MenuDTO
     * @return MenuDTO
     */
    public function deleteMenu(MenuDTO $menuDTO) {
        try {
            $menu = Menu::findOrFail($menuDTO->id);
            $menu->delete();

            return $menu;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
