<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

// ---------- Catalogs ----------
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index'])->name('Catalogs');
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create'])->name('Catalog Create');
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store'])->name('Catalog Store');
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit'])->name('Catalog Edit');
// Route::patch('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update'])->name('Catalog Update');
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy'])->name('Catalog Delete');
Route::resource('/catalogs', App\Http\Controllers\CatalogController::class, [
	'names' => [
		'index' => 'Catalogs'
	]
]);

// ---------- Authors ----------
Route::resource('/authors', App\Http\Controllers\AuthorController::class, [
	'names' => [
		'index' => 'Authors'
	]
]);

// ---------- Books ----------
// Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('Books');
Route::resource('/books', App\Http\Controllers\BookController::class, [
	'names' => [
		'index' => 'books'
	]
]);

// ---------- Members ----------
// Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('Members');
Route::resource('/members', App\Http\Controllers\MemberController::class, [
	'names' => [
		'index' => 'Members'
	]
]);

// ---------- Publishers ----------
// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index'])->name('Publishers');
// Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create'])->name('Publisher Create');
// Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store'])->name('Publisher Store');
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit'])->name('Publisher Edit');
// Route::patch('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update'])->name('Publisher Update');
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy'])->name('Publisher Delete');
Route::resource('/publishers', App\Http\Controllers\PublisherController::class, [
	'names' => [
		'index' => 'Publishers'
	]
]);

Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);
