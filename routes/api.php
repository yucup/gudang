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

Route::group(['middleware' => 'keluar', 'prefix' => 'auth'], function () {
    Route::get('data', [Keluar::class, 'index']);
    Route::get('data/{id}', [Keluar::class, 'show']);
    Route::post('data', [Keluar::class, 'store']);
    Route::put('data/{id}', [Keluar::class, 'update']);
    Route::delete('data/{id}', [Keluar::class, 'destroy']);   
});

Route::group(['middleware' => 'masuk', 'prefix' => 'auth'], function() {
    Route::get('barang', [Masuk::class, 'index']);
    Route::get('barang/{id}', [Masuk::class, 'show']);
    Route::post('barang', [Masuk::class, 'store']);
    Route::put('barang/{id}', [Masuk::class, 'update']);
    Route::delete('barang/{id}', [Masuk::class, 'destroy']);
});