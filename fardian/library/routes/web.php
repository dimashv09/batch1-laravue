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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/api/home', [App\Http\Controllers\HomeController::class, 'api']);
Route::get('/api/author', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publisher', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/member', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/book', [App\Http\Controllers\BookController::class, 'api']);
Route::get('/api/transaction', [App\Http\Controllers\TransactionController::class, 'api']);
Route::get('/api2/transaction', [App\Http\Controllers\TransactionController::class, 'api2']);
Route::get('/test_spatie/home', [App\Http\Controllers\HomeController::class, 'test_spatie']);

Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::resource('/author', App\Http\Controllers\AuthorController::class);
Route::resource('/publisher', App\Http\Controllers\PublisherController::class);
Route::resource('/catalog', App\Http\Controllers\CatalogController::class);
Route::resource('/member', App\Http\Controllers\MemberController::class);
Route::resource('/book', App\Http\Controllers\BookController::class);
Route::resource('/transaction', App\Http\Controllers\TransactionController::class);