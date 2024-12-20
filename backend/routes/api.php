<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProductSkuController;
use App\Http\Controllers\API\ProductAttributeController;
use App\Http\Controllers\API\ProductSkuAttributeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderItemController;

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

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('users', UserController::class);

        Route::apiResource('products', ProductController::class);
        Route::prefix('/products')->group(function () {
            Route::patch('/{id}/restore', [ProductController::class, 'restore']);
            Route::delete('/{id}/force', [ProductController::class, 'forceDelete']);
        });

        Route::apiResource('product-skus', ProductSkuController::class);
        Route::prefix('/product-skus')->group(function () {
            Route::patch('/{id}/restore', [ProductSkuController::class, 'restore']);
            Route::delete('/{id}/force', [ProductSkuController::class, 'forceDelete']);
        });

        Route::apiResource('product-attributes', ProductAttributeController::class);
        Route::prefix('/product-attributes')->group(function () {
            Route::patch('/{id}/restore', [ProductAttributeController::class, 'restore']);
            Route::delete('/{id}/force', [ProductAttributeController::class, 'forceDelete']);
        });

        Route::apiResource('product-sku-attributes', ProductSkuAttributeController::class);
        Route::prefix('/product-sku-attributes')->group(function () {
            Route::patch('/{id}/restore', [ProductSkuAttributeController::class, 'restore']);
            Route::delete('/{id}/force', [ProductSkuAttributeController::class, 'forceDelete']);
        });

        Route::apiResource('orders', OrderController::class);
        Route::prefix('/orders')->group(function () {
            Route::patch('/{id}/restore', [OrderController::class, 'restore']);
            Route::delete('/{id}/force', [OrderController::class, 'forceDelete']);
        });

        Route::apiResource('order-items', OrderItemController::class);
        Route::prefix('/order-items')->group(function () {
            Route::patch('/{id}/restore', [OrderItemController::class, 'restore']);
            Route::delete('/{id}/force', [OrderItemController::class, 'forceDelete']);
        });
        
        Route::apiResource('roles', RoleController::class);
        Route::prefix('/roles')->group(function () {
            Route::patch('/{id}/restore', [RoleController::class, 'restore']);
            Route::delete('/{id}/force', [RoleController::class, 'forceDelete']);
        });

        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});