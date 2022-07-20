<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index'])->name('publisher');
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
Route::get('/book', [App\Http\Controllers\BookController::class, 'index'])->name('book');
