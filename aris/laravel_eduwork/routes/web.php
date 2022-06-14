<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\MasterController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalogs',[CatalogController::class, 'index']);
Route::get('/catalogs/create',[CatalogController::class, 'create']);
Route::post('/catalogs/create',[CatalogController::class, 'store']);
Route::get('/catalogs/edit/{catalog}', [CatalogController::class, 'edit']);
Route::put('/catalogs/edit/{catalog}', [CatalogController::class, 'update']);
Route::delete('catalogs/delete/{catalog}',[CatalogController::class, 'destroy']);
Route::get('/master',[MasterController::class, 'index']);
Route::get('/test_spatie', [CatalogController::class, 'test_spatie']);
// Route::get('/publishers',[PublisherController::class, 'index']);
// Route::get('/publishers/create',[PublisherController::class, 'create']);
// Route::post('/publishers/create',[PublisherController::class, 'store']);
// Route::get('/publishers/edit/{id}',[PublisherController::class, 'edit']);
// Route::put('/publishers/edit/{id}',[PublisherController::class, 'update']);
// Route::delete('/publishers/delete/{id}',[PublisherController::class, 'destroy']);

// Route::get('/authors',[AuthorController::class, 'index']);
Route::resource('/publishers', PublisherController::class);
Route::resource('/authors', AuthorController::class);
Route::resource('/members',MemberController::class);
Route::resource('/books',BookController::class);
Route::resource('/transactions',TransactionController::class);

Route::get('/api/transactions',[TransactionController::class, 'api']);
Route::get('/date/transactions',[TransactionController::class, 'date']);
Route::get('/api/authors',[AuthorController::class, 'api']);
Route::get('/api/publishers',[PublisherController::class, 'api']);
Route::get('/api/members',[MemberController::class, 'api']);
Route::get('/api/books',[BookController::class, 'api']);

Route::get('/publishers',[PublisherController::class, 'index']);