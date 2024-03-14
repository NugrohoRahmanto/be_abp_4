<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriMenuController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\ShopController;
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
    Route::post('/user/add', [UserController::class, 'addUser'])->name('addUser');
    Route::put('/user/edit', [UserController::class, 'editUser'])->name('editUser');
    Route::delete('/user/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
    
    Route::get('/kategori/menu/all', [MenuCategoryController::class, 'getAllKategoriM'])->name('getAllKategoriM');
    Route::post('/kategori/menu/add', [MenuCategoryController::class, 'addKategoriM'])->name('addKategoriM');
    Route::put('/kategori/menu/edit', [MenuCategoryController::class, 'editKategoriM'])->name('editKategoriM');
    Route::delete('/kategori/menu/delete', [MenuCategoryController::class, 'deleteKategoriM'])->name('deleteKategoriM');

    Route::get('/shop/all', [ShopController::class, 'getAllShop'])->name('getAllShop');
    Route::post('/shop/add', [ShopController::class, 'addShop'])->name('addShop');
    Route::put('/shop/edit', [ShopController::class, 'editShop'])->name('editShop');
    Route::delete('/shop/delete', [ShopController::class, 'deleteShop'])->name('deleteShop');
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