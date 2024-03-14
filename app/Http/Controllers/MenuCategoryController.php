<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\MenuCategory\GetAllMenuCategoryService;
use App\Services\MenuCategory\AddMenuCategoryService;
use App\Services\MenuCategory\EditMenuCategoryService;
use App\Services\MenuCategory\DeleteMenuCategoryService;

class MenuCategoryController extends Controller
{
    public function __construct(
        private GetAllMenuCategoryService $getAllMenuCategoryService,
        private AddMenuCategoryService $addMenuCategoryService,
        private EditMenuCategoryService $editMenuCategoryService,
        private DeleteMenuCategoryService $deleteMenuCategoryService
    ) {}

    public function getAllKategoriM(Request $request) {
        try {
            $resultData = $this->getAllMenuCategoryService->getAllMenuCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All menu category data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addKategoriM(Request $request) {
        try {
            $resultData = $this->addMenuCategoryService->addMenuCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Menu category data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function editKategoriM(Request $request) {
        try {
            $resultData = $this->editMenuCategoryService->editMenuCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Menu category data edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteKategoriM(Request $request) {
        try {
            $resultData = $this->deleteMenuCategoryService->deleteMenuCategory($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Menu category data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

}
