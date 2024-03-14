<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Shop\GetAllShopWithUserService;
use App\Services\Shop\AddShopService;
use App\Services\Shop\EditShopService;
use App\Services\Shop\DeleteShopService;

class ShopController extends Controller
{
    public function __construct(
        private GetAllShopWithUserService $getAllShopWithUserService,
        private AddShopService $addShopService,
        private EditShopService $editShopService,
        private DeleteShopService $deleteShopService
    ) {}

    public function getAllShop(Request $request) {
        try {
            $resultData = $this->getAllShopWithUserService->getAllShopWithUser($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All shop data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addShop(Request $request) {
        try {
            $resultData = $this->addShopService->addShop($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Shop data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function editShop(Request $request) {
        try {
            $resultData = $this->editShopService->editShop($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Shop data edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteShop(Request $request) {
        try {
            $resultData = $this->deleteShopService->deleteShop($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Shop data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
