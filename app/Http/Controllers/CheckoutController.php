<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Checkout\GetAllCheckoutService;
use App\Services\Checkout\AddCheckoutService;
use App\Services\Checkout\DeleteCheckoutService;

class CheckoutController extends Controller
{
    public function __construct(
        private GetAllCheckoutService $getAllCheckoutService,
        private AddCheckoutService $addCheckoutService,
        private DeleteCheckoutService $deleteCheckoutService
    ) {}

    public function getAllMenuByBookingId($bookingId) {
        try {
            $resultData = $this->getAllCheckoutService->getAllCheckout($bookingId);
            return response()->json([
                'status' => 'success',
                'message' => 'All menu checkout from this booking data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addMenuByBookingId(Request $request) {
        try {
            $resultData = $this->addCheckoutService->addCheckout($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Menu checkout from this booking data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteMenuByBookingId(Request $request) {
        try {
            $resultData = $this->deleteCheckoutService->deleteCheckout($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Menu checkout from this booking data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
