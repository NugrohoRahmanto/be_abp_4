<?php

namespace App\Repositories\Menu;

use Exception;
use App\DTO\MenuDTO;

use App\Models\Menu;

class AddMenuImageRepository {
    /**
     * Register new Menu
     * @param MenuDTO $MenuDTO
     * @return MenuDTO
     */
    public function addMenuImage(MenuDTO $menuDTO) {
        try {
            $menu = Menu::find($menuDTO->getId());
            $menu->image = $menuDTO->getImage();
            $menu->save();

            return $menuDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
