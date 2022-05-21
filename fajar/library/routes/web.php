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
<<<<<<< HEAD
=======
Route::resource('member', App\Http\Controllers\MemberController::class);

//api data table
Route::get('/api/author', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publisher', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/member', [App\Http\Controllers\MemberController::class, 'api']);
>>>>>>> parent of e32c733 (error crud book)



Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
<<<<<<< HEAD
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
=======
>>>>>>> parent of e32c733 (error crud book)
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index']);