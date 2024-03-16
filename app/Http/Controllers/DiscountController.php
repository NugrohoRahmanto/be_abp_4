<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Discount\GetAllDiscountWithShopService;
use App\Services\Discount\AddDiscountService;
use App\Services\Discount\EditDiscountService;
use App\Services\Discount\DeleteDiscountService;

class DiscountController extends Controller
{
    public function __construct(
        private GetAllDiscountWithShopService $getAllDiscountWithUserService,
        private AddDiscountService $addDiscountService,
        private EditDiscountService $editDiscountService,
        private DeleteDiscountService $deleteDiscountService
    ) {}

    public function getAllDiscount(Request $request) {
        try {
            $resultData = $this->getAllDiscountWithUserService->getAllDiscountWithShop($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All discount data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addDiscount(Request $request) {
        try {
            $resultData = $this->addDiscountService->addDiscount($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Discount data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function editDiscount(Request $request) {
        try {
            $resultData = $this->editDiscountService->editDiscount($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Discount data edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteDiscount(Request $request) {
        try {
            $resultData = $this->deleteDiscountService->deleteDiscount($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Discount data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
