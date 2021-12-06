<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CatalogController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);

// Catalog's Routes Start (Old)
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']); // Show main page
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']); // show create page
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']); // store data
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']); // show edit page
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']); // update data
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']); // delete data
// Catalog's Routes End

// Catalog's Route (New)
Route::resource('catalogs', CatalogController::class);

// Publisher's Route
Route::resource('publishers', PublisherController::class);

// Author's Route
Route::resource('authors', AuthorController::class);
