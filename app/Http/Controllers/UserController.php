<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private GetUserInfoService $getUserInfoService,
        private RegisterService $registerService,
        private LoginService $loginService,
        private LogoutService $logoutService
    ) {}

    public function getAllUser(Request $request) {
        try {
            return response()->json([
                'status' => 'success',
                'message' => 'User info retrieved successfully',
                'data' => $this->getUserInfoService->getUserInfo($request)
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function addUser(Request $request) {
        try {
            $resultData = $this->registerService->register($request);
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'data' => '$resultData'
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    public function editUser(Request $request) {
        try {
            $resultData = $this->loginService->login($request);
            return response()->json([
                'status' => 'success',
                'message' => 'User logged in successfully',
                'data' => $resultData
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function deleteUser(Request $request) {
        try {
            $resultData = $this->logoutService->logout($request);

            return response()->json([
                'status' => 'success',
                'message' => 'User logged out successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
