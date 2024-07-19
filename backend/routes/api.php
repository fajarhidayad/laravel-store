<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::apiResource('products', ProductController::class);

// PRODUCTS
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/latest', [ProductController::class, 'latest']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// CATEGORIES
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::middleware(['auth:admin'])->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});


Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminController::class, 'login']);

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/profile', [AdminController::class, 'profile']);
        Route::post('/logout', [AdminController::class, 'logout']);

        Route::get('/users', [AdminController::class, 'users']);
    });
});

// Auth Route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/address', [AddressController::class, 'index']);
    Route::get('/address/{address}', [AddressController::class, 'show']);
    Route::post('/address', [AddressController::class, 'store']);
    Route::put('/address/{address}', [AddressController::class, 'update']);
    Route::delete('/address/{address}', [AddressController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
});
