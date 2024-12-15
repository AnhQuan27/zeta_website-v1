<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RoleController;

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

        Route::apiResource('orders', OrderController::class);
        Route::prefix('/orders')->group(function () {
            Route::patch('/{id}/restore', [OrderController::class, 'restore']);
            Route::delete('/{id}/force', [OrderController::class, 'forceDelete']);
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