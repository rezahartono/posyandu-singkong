<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\MasterData\KategoriController;
use App\Http\Controllers\Web\MasterData\UsersController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index']);
    Route::prefix('master-data')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index']);
            Route::get('create', [UsersController::class, 'create']);
            Route::post('create', [UsersController::class, 'create']);
            Route::get('delete/{id}', [UsersController::class, 'delete']);
            Route::get('edit/{id}', [UsersController::class, 'update']);
            Route::post('edit/{id}', [UsersController::class, 'update']);
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [KategoriController::class, 'index']);
            Route::get('create', [KategoriController::class, 'create']);
            Route::post('create', [KategoriController::class, 'create']);
            Route::get('delete/{id}', [KategoriController::class, 'delete']);
            Route::get('edit/{id}', [KategoriController::class, 'update']);
            Route::post('edit/{id}', [KategoriController::class, 'update']);
        });
    });
});
