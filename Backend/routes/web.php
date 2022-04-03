<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\barangControllers;
use App\Http\Controllers\TransaksiController;

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
Route::resource('/api/barang', barangControllers::class);
Route::post('/api/barang/new/data', [barangControllers::class, 'store']);
Route::get('/api/barang/get/all', [barangControllers::class, 'getAll']);
Route::get('/api/barang/search/{keyword}', [barangControllers::class, 'search']);
Route::post('/api/barang/total', [TransaksiController::class, 'saveTotal']);
Route::post('/api/barang/trx', [TransaksiController::class, 'saveTrx']);