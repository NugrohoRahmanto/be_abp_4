<?php

namespace App\Services\Menu;

use Exception;
use Illuminate\Http\Request;

use App\DTO\MenuDTO;

use App\Repositories\Menu\EditMenuRepository;

class EditMenuService {
    public function __construct(
        private EditMenuRepository $MenuRepository
    ) {}

    /**
     * Edit Menu
     * @param Request $request
     * @return MenuDTO
     */
    public function editMenu(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:menus,id',
                'namaMenu' => 'required',
                'hargaMenu' => 'required',
                'deskripsiMenu' => 'required',
            ]);

            $menuDTO = new MenuDTO(
                id: $request->id,
                namaMenu: $request->namaMenu,
                hargaMenu: $request->hargaMenu,
                deskripsiMenu: $request->deskripsiMenu,
            );

            $menuDTO = $this->MenuRepository->editMenu($menuDTO);

            return $menuDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
