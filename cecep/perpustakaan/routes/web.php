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
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);


Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index']);
Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
