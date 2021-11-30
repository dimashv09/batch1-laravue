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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::get('/book', [App\Http\Controllers\BookController::class, 'index'])->name('book');
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index'])->name('publisher');
