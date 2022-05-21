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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::resource('catalog', App\Http\Controllers\CatalogController::class);
Route::resource('author', App\Http\Controllers\AuthorController::class);
Route::resource('publisher', App\Http\Controllers\PublisherController::class);



Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index']);