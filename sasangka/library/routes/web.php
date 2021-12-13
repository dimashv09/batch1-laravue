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
Route::get('/catalogs', [App\Http\Controllers\CataLogControllers::class, 'index']);
Route::get('/Publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/Authors', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/Books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/Members', [App\Http\Controllers\MembersControllers::class, 'index']);
