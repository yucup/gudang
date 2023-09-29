<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Keluar;
use App\Http\Controllers\Masuk;
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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['prefix' => 'data'], function () {
    Route::get('/', [Keluar::class, 'index']);
    Route::get('/{id}', [Keluar::class, 'show']);
    Route::post('/', [Keluar::class, 'store']);
    Route::put('/', [Keluar::class, 'update']);
    Route::delete('/{id}', [Keluar::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [Masuk::class, 'index']);
    Route::get('/{id}', [Masuk::class, 'show']);
    Route::post('/', [Masuk::class, 'store']);
    Route::put('/{id}', [Masuk::class, 'update']);
    Route::delete('/{id}', [Masuk::class, 'destroy']);
});

// Route::group(['middleware' => 'masuk', 'prefix' => 'auth'], function() {
//     Route::get('barang', [Masuk::class, 'index']);
//     Route::get('barang/{id}', [Masuk::class, 'show']);
//     Route::post('barang', [Masuk::class, 'store']);
//     Route::put('barang/{id}', [Masuk::class, 'update']);
//     Route::delete('barang/{id}', [Masuk::class, 'destroy']);
// });


// api/data/buku
// api/data/pengguna

// api/transaction/user
// api/transaction/supplier