<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Auth\GetUserInfoService;
use App\Services\Auth\RegisterService;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(
        private GetUserInfoService $getUserInfoService,
        private RegisterService $registerService,
        private LoginService $loginService,
        private LogoutService $logoutService
    ) {}

    public function getUserInfo(Request $request) {
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

    public function register(Request $request) {
        try {
            $resultData = $this->registerService->register($request);
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(400);
        }
    }

    public function login(Request $request) {
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

    public function logout(Request $request) {
        try {
            $user = $request->user();

            if ($user !== null && isset($user['nickname'])) {
                $final = User::where('nickname', $user['nickname'])->update([
                    'status' => 'offline'
                ]);
            } else {
                throw new \Exception("User information not found or invalid.");
            }
            
            $request->user()->currentAccessToken()->delete();
            
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
