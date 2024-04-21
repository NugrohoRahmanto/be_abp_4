<?php

namespace App\Services\Shop;

use Illuminate\Http\Request;

use App\DTO\ShopDTO;
use Exception;

use App\Repositories\Shop\AddShopImageRepository;


class AddShopImageService {
    public function __construct(
        private AddShopImageRepository $addShopImageRepository
    ) {}

    /**
     * Register new Shop
     * @param Request $request
     * @return ShopDTO
     */
    public function addShopImage(Request $request) {
        try {
            $request->validate([
                'id' => 'required|exist:shops,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $shopDTO = new ShopDTO(
                id : $request->shop_id,
                image: $request->image,
            );

            $shopResult = $this->addShopImageRepository->AddShopImage($shopDTO);

            return ([
                'image' => $shopResult->getImage(),
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
