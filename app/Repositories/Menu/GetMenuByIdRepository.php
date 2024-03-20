<?php

namespace App\Repositories\Menu;

use Exception;

use App\Models\Menu;
use App\DTO\MenuDTO;

class GetMenuByIdRepository
{
    public function getMenuById($shop_id)
    {
        try{
            $menus = Menu::join('shops', 'menus.shop_id', '=', 'shops.id')
                ->select('menus.*', 'shops.namaToko')
                ->where('menus.shop_id', $shop_id)
                ->orderBy('menus.namaMenu', 'asc')
                ->get();

            $menuDTOs = [];

            foreach ($menus as $menu) {
                $menuDTO = [
                    'id' => $menu->id,
                    'namaMenu' => $menu->namaMenu,
                    'hargaMenu' => $menu->hargaMenu,
                    'deskripsiMenu' => $menu->deskripsiMenu
                ];

                array_push($menuDTOs, $menuDTO);
            }

            return $menuDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
