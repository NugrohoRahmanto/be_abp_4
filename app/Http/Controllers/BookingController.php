<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Booking\GetBookingByUserIdService;
use App\Services\Booking\GetOneBookingIdByUserIdService;
use App\Services\Booking\GetAllBookingService;
use App\Services\Booking\AddBookingService;
use App\Services\Booking\EditBookingService;
use App\Services\Booking\DeleteBookingService;

class BookingController extends Controller
{
    public function __construct(
        private GetBookingByUserIdService $getBookingByUserIdService,
        private GetOneBookingIdByUserIdService $getOneBookingByUserIdService,
        private GetAllBookingService $getAllBookingService,
        private AddBookingService $addBookingService,
        private EditBookingService $editBookingService,
        private DeleteBookingService $deleteBookingService
    ) {}

    public function getBookingByUserId(Request $request) {
        try {
            $resultData = $this->getBookingByUserIdService->getBookingById($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Booking data by user Id retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function getOneBookingIdByUserId(Request $request) {
        try {
            $resultData = $this->getOneBookingByUserIdService->getBookingById($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Get booking id by user Id retrieved successfully',
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
            $user_id = null;
            $resultData = $this->addBookingService->addBooking($request, $user_id);
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
