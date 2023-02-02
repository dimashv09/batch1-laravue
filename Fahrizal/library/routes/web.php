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
Route::post('/catalogs', [App\Http\Controllers\catalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\catalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\catalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\catalogController::class, 'destroy']);

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create']);
Route::post('/authors', [App\Http\Controllers\AuthorController::class, 'store']);
Route::get('/authors/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/authors/{author}', [App\Http\Controllers\AuthorController::class, 'destroy']);


Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
Route::post('/publishers', [App\Http\Controllers\AuthorController::class, 'store']);
Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
Route::put('/publishers/{publisher}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/publishers/{publisher}', [App\Http\Controllers\AuthorController::class, 'destroy']);

Route::get('/books', [App\Http\Controllers\bookController::class, 'index']);
Route::get('/books/create', [App\Http\Controllers\bookController::class, 'create']);
Route::post('/books', [App\Http\Controllers\bookController::class, 'store']);
Route::get('/books/{book}/edit', [App\Http\Controllers\bookController::class, 'edit']);
Route::put('/books/{book}', [App\Http\Controllers\bookController::class, 'update']);
Route::delete('/books/{book}', [App\Http\Controllers\bookController::class, 'destroy']);

Route::get('/members', [App\Http\Controllers\memberController::class, 'index']);
Route::get('/members/create', [App\Http\Controllers\memberController::class, 'create']);
Route::post('/members', [App\Http\Controllers\memberController::class, 'store']);
Route::get('/members/{member}/edit', [App\Http\Controllers\memberController::class, 'edit']);
Route::put('/members/{member}', [App\Http\Controllers\memberController::class, 'update']);
Route::delete('/members/{member}', [App\Http\Controllers\memberController::class, 'destroy']);

Route::get('/transactions', [App\Http\Controllers\transactionController::class, 'index']);
Route::get('/transactions/create', [App\Http\Controllers\transactionController::class, 'create']);
Route::post('/transactions', [App\Http\Controllers\transactionController::class, 'store']);
Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\transactionController::class, 'edit']);
Route::put('/transactions/{transaction}', [App\Http\Controllers\transactionController::class, 'update']);
Route::delete('/transactions/{transaction}', [App\Http\Controllers\mtransactionController::class, 'destroy']);