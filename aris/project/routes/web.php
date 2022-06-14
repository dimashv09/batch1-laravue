<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('/users', UserController::class);
Route::resource('/products', ProductController::class);
Route::get('/', [UserController::class, 'home']);
Route::get('/api/users',[UserController::class, 'api']);
Route::get('/api/products',[ProductController::class, 'api']);
Route::get('/addcart/{id}',[ProductController::class, 'addcart']);
Route::get('/updatecart/{id}',[ProductController::class, 'updatecart']);
Route::get('/showcart',[ProductController::class, 'showcart']);
Route::get('/delete/{id}',[ProductController::class, 'delete']);
Route::get('/search',[ProductController::class, 'search']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
