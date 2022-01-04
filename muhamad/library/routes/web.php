<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Start Catalog's Routes (Old)
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']); //? Show main page
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']); //? show create page
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']); //? store data
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']); //? show edit page
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']); //? update data
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']); //? delete data
// End Catalog's Routes

// Catalog's Route (New)
Route::resource('catalogs', CatalogController::class);

// Publisher's Route
Route::resource('publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class, 'api']);

// Author's Route
Route::resource('authors', AuthorController::class);
Route::get('/api/authors', [AuthorController::class, 'api']);

// Member's Route
Route::resource('members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'api']);

// Book's Route
Route::resource('books', BookController::class);
Route::get('/api/books', [BookController::class, 'api']);

// Dashboard's Route
Route::resource('dashboard', DashboardController::class);

// Transaction's Route
Route::resource('transactions', TransactionController::class);
Route::get('/api/transactions', [TransactionController::class, 'api']);
Route::get('spaties', [TransactionController::class, 'setRole']);
