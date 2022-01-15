<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//book
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::resource('books', BookController::class);

//Author
Route::resource('authors', AuthorController::class);
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);

//Member// Catalogs
Route::resource('catalogs', CatalogController::class);

// Publishers
Route::resource('publishers', PublisherController::class);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);

//Member
Route::resource('members', MemberController::class);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);

// dashboard
Route::resource('dashboard', DashboardController::class);

// Transaction
Route::resource('transactions', TransactionController::class);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

// TransactionDetails
Route::resource('transaction_details', TransactionDetailController::class);
Route::get('/api/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'api']);

// admin
Route::get('transaction', [App\Http\Controllers\AdminController::class, 'transaction']);

Route::get('test_spatie', [App\Http\Controllers\TransactionController::class, 'test_spatie']);