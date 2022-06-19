<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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
Route::post('/addcart/{id}',[ProductController::class, 'addcart']);
Route::get('/updatecart/{id}',[ProductController::class, 'updatecart']);
Route::get('/showcart',[ProductController::class, 'showcart']);
Route::get('/delete/{id}',[ProductController::class, 'delete']);
Route::get('/search',[ProductController::class, 'search']);
Route::get('/invoice',[ProductController::class, 'pdf']);
Route::get('/order',[TransactionController::class, 'order']);
Route::get('/payment/pdf',[TransactionController::class, 'pdf']);
Route::get('/orders',[TransactionController::class, 'index']);
Route::get('/payment',[ProductController::class, 'payment']);

Route::get('/order/product',[ProductController::class, 'order']);
Route::get('/transaction/{id}',[TransactionController::class, 'update']);
Route::get('/reports',[TransactionController::class, 'report']);
Route::get('/delete/transaction/{id}',[TransactionController::class, 'destroy']);
Route::get('/delete_transaction',[TransactionController::class, 'deletetransaction']);
Route::get('/updateharga',[TransactionController::class, 'index']);
Route::get('/api/orders',[TransactionController::class, 'apiorder']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
