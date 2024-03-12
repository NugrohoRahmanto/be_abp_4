<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/user/info', [AuthController::class, 'getUserInfo'])->middleware('auth:sanctum')->name('getUserInfo');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/all', [UserController::class, 'getAllUser'])->name('getAllUser');
    Route::get('/user/add', [UserController::class, 'addUser'])->name('addUser');
    Route::get('/user/edit', [UserController::class, 'editUser'])->name('editUser');
    Route::get('/user/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
});

Route::post('/token/test', function() {
    try {
        return response()->json([
            'status' => 'success',
            'message' => 'Token is valid'
        ]);
    } catch (Exception $error) {
        return response()->json([
            'status' => 'error',
            'message' => $error->getMessage()
        ]);
    }
})->middleware('auth:sanctum');

Route::any('{any}', function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Endpoint not found'
    ])->setStatusCode(404);
})->where('any', '.*');