<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/catalogs', App\Http\Controllers\CatalogController::class);

// Author
Route::resource('/authors', App\Http\Controllers\AuthorController::class);
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);

// Publisher
Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);

// Member
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);

// Book
Route::resource('/books', App\Http\Controllers\BookController::class);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);

// Transaction
Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

// TransactionDetails
Route::resource('/transaction_details', App\Http\Controllers\TransactionDetailController::class);
Route::get('/api/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'api']);

// Test Spatie
Route::get('/test_spatie', [App\Http\Controllers\TransactionController::class, 'test_spatie']);
