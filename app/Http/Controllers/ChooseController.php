<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\ChooseCategory\GetAllChooseCategoryService;
use App\Services\ChooseCategory\AddChooseCategoryService;
use App\Services\ChooseCategory\DeleteChooseCategoryService;

class ChooseController extends Controller
{
    public function __construct(
        private GetAllChooseCategoryService $getAllChooseCategoryService,
        private AddChooseCategoryService $addChooseCategoryService,
        private DeleteChooseCategoryService $deleteChooseCategoryService
    ) {}

    public function getAllMenuCategoryByMenuId($menuId) {
        try {
            $resultData = $this->getAllChooseCategoryService->getAllChooseCategory($menuId);
            return response()->json([
                'status' => 'success',
                'message' => 'All Category from this menu data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addMenuCategoryByMenuId(Request $request) {
        try {
            $resultData = $this->addChooseCategoryService->addChooseCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Category from this menu data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteMenuCategoryByMenuId(Request $request) {
        try {
            $resultData = $this->deleteChooseCategoryService->deleteChooseCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Category from this menu data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
