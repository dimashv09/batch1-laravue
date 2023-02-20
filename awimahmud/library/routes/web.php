<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
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
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'api']);
  
Route::resource('publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class, 'api']);

Route::resource('authors', AuthorController::class);
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);