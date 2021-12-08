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
Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('catalog', App\Http\Controllers\CatalogController::class);
    Route::resource('book', App\Http\Controllers\BookController::class);
    Route::resource('publisher', App\Http\Controllers\PublisherController::class);
    Route::resource('writer', App\Http\Controllers\WriterController::class);
    Route::resource('member', App\Http\Controllers\MemberController::class);
});

