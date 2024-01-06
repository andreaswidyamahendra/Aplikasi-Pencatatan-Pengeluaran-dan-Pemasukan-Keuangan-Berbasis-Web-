<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriController;

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/tambahkategori', [KategoriController::class, 'tambahkategori']);
Route::post('/simpankategori', [KategoriController::class, 'simpankategori']);

Route::get('transaksi', [TransaksiController::class, 'index']); 
Route::get('/tambahtransaksi', [TransaksiController::class, 'tambahtransaksi']);
Route::post('/simpantransaksi', [TransaksiController::class, 'simpanTransaksi']);

Route::get('/kategori/edit/{id}', [KategoriController::class, 'editkategori']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edittransaksi']);
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'delete']);