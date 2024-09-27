<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('Dashboard');

//Resourcec
Route::resource('/catalogs', App\Http\Controllers\CatalogController::class, [
    'names' => [
        'index' => 'Catalogs'
    ]
]);

Route::resource('/authors', App\Http\Controllers\AuthorController::class, [
    'names' => [
        'index' => 'Authors'
    ]
]);

Route::resource('/books', App\Http\Controllers\BookController::class, [
    'names' => [
        'index' => 'books'
    ]
]);

Route::resource('/members', App\Http\Controllers\MemberController::class, [
    'names' => [
        'index' => 'Members'
    ]
]);

Route::resource('/publishers', App\Http\Controllers\PublisherController::class, [
    'names' => [
        'index' => 'Publishers'
    ]
]);

Route::resource('/transactions', App\Http\Controllers\TransactionController::class, [
    'names' => [
        'index' => 'transaction.index',
        'show' => 'transaction.show',
        'edit' => 'transaction.edit',
        'update' => 'transaction.update',
        'destroy' => 'transaction.destroy'
    ]
]);

//API
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api'])->name('get.transactions');