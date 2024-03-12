<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\User\GetAllUserService;
use App\Services\User\AddUserService;
use App\Services\User\EditUserService;
use App\Services\User\DeleteUserService;

class UserController extends Controller
{
    public function __construct(
        private GetAllUserService $getAllUserService,
        private AddUserService $addUserService,
        private EditUserService $editUserService,
        private DeleteUserService $deleteUserService
    ) {}

    public function getAllUser(Request $request) {
        try {
            $resultData = $this->getAllUserService->getAllUser($request);
            return response()->json([
                'status' => 'success',
                'message' => 'All user data retrieved successfully',
                'data' => $resultData
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
            $resultData = $this->addUserService->addUser($request);
            return response()->json([
                'status' => 'success',
                'message' => 'User data added successfully',
                'data' => $resultData
            ])->setStatusCode(201);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }

    public function editUser(Request $request) {
        try {
            $resultData = $this->editUserService->editUser($request);
            return response()->json([
                'status' => 'success',
                'message' => 'User data edited successfully',
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
            $resultData = $this->deleteUserService->deleteUser($request);

            return response()->json([
                'status' => 'success',
                'message' => 'User data deleted successfully',
            ])->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage(),
            ])->setStatusCode(401);
        }
    }
}
