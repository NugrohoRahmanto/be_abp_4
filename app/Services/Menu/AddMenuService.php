<?php

namespace App\Services\Menu;

use Illuminate\Http\Request;

use App\DTO\MenuDTO;
use Exception;

use App\Repositories\Menu\AddMenuRepository;


class AddMenuService {
    public function __construct(
        private AddMenuRepository $addMenuRepository
    ) {}

    /**
     * Register new Menu
     * @param Request $request
     * @return MenuDTO
     */
    public function addMenu(Request $request) {
        try {
            $request->validate([
                'namaMenu' => 'required|unique:menus,namaMenu',
                'hargaMenu' => 'required',
                'deskripsiMenu' => 'required',
                'stokMenu' => 'required',
                'shop_id' => 'required|exists:shops,id',
            ]);

            $menuDTO = new MenuDTO(
                id : null,
                namaMenu: $request->namaMenu,
                hargaMenu: $request->hargaMenu,
                deskripsiMenu: $request->deskripsiMenu,
                stokMenu: $request->stokMenu,
                shop_id: $request->shop_id,
            );

            $userResult = $this->addMenuRepository->addMenu($menuDTO);

            return ([
                'namaMenu' => $userResult->getNamaMenu(),
                'hargaMenu' => $userResult->getHargaMenu(),
                'deskripsiMenu' => $userResult->getDeskripsiMenu(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
