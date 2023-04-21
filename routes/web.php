<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
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
    Route::get('/', [DashboardController::class, 'index']);
    Route::prefix('master-data')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UsersController::class, 'index']);
            Route::delete('/delete/{id}', [UsersController::class, 'delete']);
            Route::delete('/{id}', [UsersController::class, 'delete']);
        });
    });
});
