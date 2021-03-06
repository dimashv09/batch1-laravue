<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/buku',BukuController::class);
Route::resource('/anggota',AnggotaController::class);
Route::resource('/peminjaman', PeminjamanController::class);

Route::get('/api/buku',[BukuController::class, 'api']);
Route::get('/api/anggota',[AnggotaController::class, 'api']);
Route::get('/api/peminjaman',[AnggotaController::class, 'api']);
