<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('Dashboard');

// ---------- Catalogs ----------
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
Route::resource('/books', App\Http\Controllers\BookController::class, [
	'names' => [
		'index' => 'books'
	]
]);

// ---------- Members ----------
Route::resource('/members', App\Http\Controllers\MemberController::class, [
	'names' => [
		'index' => 'Members'
	]
]);

// ---------- Publishers ----------
Route::resource('/publishers', App\Http\Controllers\PublisherController::class, [
	'names' => [
		'index' => 'Publishers'
	]
]);

// ---------- Publishers ----------
Route::resource('/transactions', App\Http\Controllers\TransactionController::class, [
	'names' => [
		'index' => 'transaction.index',
		'show' => 'transaction.show',
        'edit' => 'transaction.edit',
        'update' => 'transaction.update',
        'destroy' => 'transaction.destroy'
	]
]);
// Route::patch('/transactions/update/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');

Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api'])->name('get.transactions');
