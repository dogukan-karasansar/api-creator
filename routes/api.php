<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::prefix('v1')->group(function () {
    Route::middleware('auth:api')->group(function () {
        //CATEGORY API
        Route::get('category/{id}', [CategoryController::class, 'getCategory']);
        Route::post('category', [CategoryController::class, 'store']);
        //USERS API
        Route::get('users', [UserController::class, 'getUsers']);
        Route::get('user/{id}', [UserController::class, 'getUser']);
        Route::get('me', [UserController::class, 'getMe']);
    });
        //PRODUCTS API
        Route::resource('products', ProductController::class);
        //AUTH ROUTES
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
});

