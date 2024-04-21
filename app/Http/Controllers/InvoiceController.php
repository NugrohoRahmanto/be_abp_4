<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Invoice\GetAllInvoiceMenuByBookingIdService;
use App\Services\Invoice\GetAllInvoiceByUserIdService;
use App\Services\Invoice\AddInvoiceService;
use App\Services\Invoice\DeleteInvoiceService;

class InvoiceController extends Controller
{
    public function __construct(
        private GetAllInvoiceMenuByBookingIdService $getAllInvoiceMenuByBookingIdService,
        private GetAllInvoiceByUserIdService $getAllInvoiceByUserIdService,
        private AddInvoiceService $addInvoiceService,
        private DeleteInvoiceService $deleteInvoiceService
    ) {}

    public function getAllInvoiceMenuByBookingId(Request $request) {
        try {
            $resultData = $this->getAllInvoiceMenuByBookingIdService->getAllInvoice($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All invoice menu data by booking id retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function getAllInvoiceByUserId(Request $request) {
        try {
            $resultData = $this->getAllInvoiceByUserIdService->getAllInvoice($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All invoice data by user id retrieved successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addInvoice(Request $request) {
        try {
            $resultData = $this->addInvoiceService->addInvoice($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Invoice data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteInvoice(Request $request) {
        try {
            $resultData = $this->deleteInvoiceService->deleteInvoice($request);
            return response()->json([
                'status' => 'success',
                'message' => 'Invoice data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
