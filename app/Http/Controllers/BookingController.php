<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Booking\GetBookingByShopIdService;
use App\Services\Booking\GetAllBookingService;
use App\Services\Booking\AddBookingService;
use App\Services\Booking\EditBookingService;
use App\Services\Booking\DeleteBookingService;

class BookingController extends Controller
{
    public function __construct(
        private GetBookingByShopIdService $getBookingByShopIdService,
        private GetAllBookingService $getAllBookingService,
        private AddBookingService $addBookingService,
        private EditBookingService $editBookingService,
        private DeleteBookingService $deleteBookingService
    ) {}

    public function getBookingByShopId(Request $request) {
        try {
            $resultData = $this->getBookingByShopIdService->getBookingById($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Booking data by shop Id retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function getAllBooking(Request $request) {
        try {
            $resultData = $this->getAllBookingService->getAllBooking($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All booking data retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addBooking(Request $request) {
        try {
            $resultData = $this->addBookingService->addBooking($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Booking data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function editBooking(Request $request) {
        try {
            $resultData = $this->editBookingService->editBooking($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Booking data edited successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteBooking(Request $request) {
        try {
            $resultData = $this->deleteBookingService->deleteBooking($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Booking data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
