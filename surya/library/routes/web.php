<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
