<?php

namespace App\Repositories\Menu;

use Exception;

use App\Models\Menu;

class GetAllMenuWithShopNameRepository
{
    public function getAllMenuWithShopName()
    {
        try{
            $menus = Menu::join('shops', 'menus.shop_id', '=', 'shops.id')
                ->select('menus.*', 'shops.namaToko', 'shops.image as imageToko', 'menus.image as imageMenu')
                ->orderBy('shops.namaToko', 'asc')
                ->get();

            $menuDTOs = [];

            foreach ($menus as $menu) {
                $menuDTO = [
                    'id' => $menu->id,
                    'namaMenu' => $menu->namaMenu,
                    'hargaMenu' => $menu->hargaMenu,
                    'deskripsiMenu' => $menu->deskripsiMenu,
                    'stokMenu' => $menu->stokMenu,
                    'shop_id' => $menu->shop_id,
                    'shop_namaToko' => $menu->namaToko,
                    'imageShop' => $menu->imageToko,
                    'imageMenu' => $menu->imageMenu,
                ];

                array_push($menuDTOs, $menuDTO);
            }

            return $menuDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
