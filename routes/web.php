<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\ProductContoller;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [AuthController::class, "login"])->name("auth.login");


Route::prefix('admin')->group(function () {
    Route::middleware(['admin'])->group(function () {
        //ADMİN
        Route::get('/', [AdminController::class, 'index']);
        //USERS
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/products', [ProductContoller::class, 'index'])->name('admin.products');
        Route::post('user/create', [AuthController::class, 'register'])->name('user.register');
    });
});

/* Route::group(["prefix" => 'admin', 'middleware' => ['admin']], function () {
    //ADMİN
    Route::get('/', [AdminController::class, 'index']);
});
 */


