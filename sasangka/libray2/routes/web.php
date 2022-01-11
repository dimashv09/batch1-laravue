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
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//publisher
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/publishers/create',[App\Http\Controllers\PublisherController::class, 'create']);
Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);

//author
// Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
//books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
//member
Route::get('members', [App\Http\Controllers\MemberController::class, 'index']);

//catalog
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

Route::resource('/catalogs',App\Http\Controllers\CatalogController::class);
Route::resource('/authors',App\Http\Controllers\AuthorController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class,);