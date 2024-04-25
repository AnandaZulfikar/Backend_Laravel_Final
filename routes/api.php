<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganDataController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PenyewaanDetailController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::get('/login', function(Request $request){
    return 'Unauthoreized';
});

Route::middleware('auth:api')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/{id}', [AdminController::class, 'show']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::patch('/admin/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
    Route::post('/pelanggan', [PelangganController::class, 'store']);
    Route::patch('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/pelanggan-data', [PelangganDataController::class, 'index']);
    Route::get('/pelanggan-data/{id}', [PelangganDataController::class, 'show']);
    Route::post('/pelanggan-data', [PelangganDataController::class, 'store']);
    Route::put('/pelanggan-data/{id}', [PelangganDataController::class, 'update']);
    Route::delete('/pelanggan-data/{id}', [PelangganDataController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/{id}', [KategoriController::class, 'show']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::patch('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/alat', [AlatController::class, 'index']); // Mengarahkan ke metode ind\ex
    Route::post('/alat', [AlatController::class, 'store']); // Menyimpan data alat
    Route::get('/alat/{id}', [AlatController::class, 'show']);
    Route::patch('/alat/{id}', [AlatController::class, 'patch']);
    Route::delete('/alat/{id}', [AlatController::class, 'delete']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/penyewaan', [KategoriController::class, 'index']);
    Route::get('/penyewaan/{id}', [KategoriController::class, 'show']);
    Route::post('/penyewaan', [KategoriController::class, 'store']);
    Route::patch('/penyewaan/{id}', [KategoriController::class, 'update']);
    Route::delete('/penyewaan/{id}', [KategoriController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/penyewaanDetail', [KategoriController::class, 'index']);
    Route::get('/penyewaanDetail/{id}', [KategoriController::class, 'show']);
    Route::post('/penyewaanDetail', [KategoriController::class, 'store']);
    Route::patch('/penyewaanDetail/{id}', [KategoriController::class, 'update']);
    Route::delete('/penyewaanDetail/{id}', [KategoriController::class, 'destroy']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('admin', AdminController::class)->except(['create', 'edit']);
    Route::apiResource('pelanggan', PelangganController::class)->except(['create', 'edit']);
    Route::apiResource('pelanggan-data', PelangganDataController::class)->except(['create', 'edit']);
    Route::apiResource('kategori', KategoriController::class)->except(['create', 'edit']);
    Route::apiResource('alat', AlatController::class)->except(['create', 'edit']);
    Route::apiResource('penyewaan', PenyewaanController::class)->except(['create', 'edit']);
    Route::apiResource('penyewaanDetail', AlatController::class)->except(['create', 'edit']);
});

// Route::apiResource('/admin', AdminController::class);
// Route::apiResource('/pelanggan', PelangganController::class);
// Route::apiResource('/pelangganData', PelangganDataController::class);
// Route::apiResource('/kategori', KategoriController::class);
// Route::apiResource('/alat', AlatController::class);
// Route::apiResource('/penyewaan', PenyewaanController::class);
// Route::apiResource('/penyewaanDetail', PenyewaanDetailController::class);
