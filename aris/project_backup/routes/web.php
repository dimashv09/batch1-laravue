<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
Route::resource('/users', UserController::class);
Route::get('/', [ProductController::class, 'index']);
Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::get('/cart/delete/{item}', [CartController::class, 'destroy'])->middleware('auth');
Route::get('/cart/update/{item}', [CartController::class, 'update'])->middleware('auth');

Route::get('/api/users',[UserController::class, 'api']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
