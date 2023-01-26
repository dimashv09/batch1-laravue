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
Route::get('/dasboard', [App\Http\Controllers\DasboardController::class, 'index']);


Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);



Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create']);
Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store']);
Route::get('/authors/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy']);


Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);

Route::get('/books', [App\Http\Controllers\bookController::class, 'index']);
Route::get('/books/create', [App\Http\Controllers\bookController::class, 'create']);
Route::post('/books', [App\Http\Controllers\AuthorController::class, 'store']);
Route::get('/books/{book}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/books/{book}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/books/{book}', [App\Http\Controllers\AuthorController::class, 'destroy']);

Route::get('/members', [App\Http\Controllers\memberController::class, 'index']);
Route::get('/members/create', [App\Http\Controllers\memberController::class, 'create']);

Route::get('/transactions', [App\Http\Controllers\transactionController::class, 'index']);
Route::get('/transactions/create', [App\Http\Controllers\transactionController::class, 'create']);