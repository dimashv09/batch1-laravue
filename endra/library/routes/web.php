<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::resource('/books', App\Http\Controllers\BookController::class);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);

Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);

Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);

Route::get('/dasboard', [App\Http\Controllers\DasboardController::class, 'index']);
Route::get('/api/dasboard', [App\Http\Controllers\DasboardController::class, 'api']);

Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);

Route::resource('/authors', App\Http\Controllers\AuthorController::class);
