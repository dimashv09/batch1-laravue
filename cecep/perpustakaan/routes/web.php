<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction_detail', [App\Http\Controllers\TransactionDetailController::class, 'index']);
Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
