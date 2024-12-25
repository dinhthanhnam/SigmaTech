<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GaminggearController;
use App\Http\Controllers\Api\LaptopController;
use App\Models\Gaminggear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group( function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/laptops', [LaptopController::class, 'index']);
    Route::get('/laptops/{id}', [LaptopController::class, 'show']);
    Route::get('/gaminggears', [GaminggearController::class, 'index']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'show']);
    Route::post('/cart', [CartController::class, 'addToCart']);
    Route::put('cart/{product_type}/{product_id}', [CartController::class, 'update']);
    Route::put('cart/bulk-update', [CartController::class, 'updateBulkQuantity']);
    Route::delete('cart/{product_type}/{product_id}', [CartController::class, 'remove']);
    Route::get('cart/count', [CartController::class, 'cartCount']);
});
Route::middleware('auth:sanctum')->prefix('cart/order')->group(function () {
    Route::post('/', [OrderController::class, 'orderInfo']);
    Route::post('/place', [OrderController::class, 'placeOrder']);
});

Route::middleware('auth:sanctum')->get('account', [OrderController::class, 'index']);  // API lấy danh sách đơn hàng
Route::middleware('auth:sanctum')->get('account/order/{id}', [OrderController::class, 'getOrderDetails']);  // API lấy chi tiết đơn hàng

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
