<?php

namespace App\Services\Menu;

use Exception;
use Illuminate\Http\Request;

use App\DTO\MenuDTO;

use App\Repositories\Menu\DeleteMenuRepository;

class DeleteMenuService {
    public function __construct(
        private DeleteMenuRepository $menuRepository
    ) {}

    /**
     * Delete Menu
     * @param Request $request
     * @return MenuDTO
     */
    public function deleteMenu(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exists:menus,id',
            ]);

            $menuDTO = new MenuDTO(
                id : $request->id
            );

            $menuDTO = $this->menuRepository->deleteMenu($menuDTO);

            return $menuDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
