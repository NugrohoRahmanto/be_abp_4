<?php

namespace App\Services\Menu;

use Illuminate\Http\Request;

use App\DTO\MenuDTO;
use Exception;

use App\Repositories\Menu\AddMenuImageRepository;


class AddMenuImageService {
    public function __construct(
        private AddMenuImageRepository $addMenuImageRepository
    ) {}

    /**
     * Register new Menu
     * @param Request $request
     * @return MenuDTO
     */
    public function addMenuImage(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exist:menus,id',
                'image' => 'required',
            ]);

            $menuDTO = new MenuDTO(
                id : $request->menu_id,
                image: $request->image,
            );

            $menuResult = $this->addMenuImageRepository->addMenuImage($menuDTO);

            return ([
                'image' => $menuResult->getImage(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
