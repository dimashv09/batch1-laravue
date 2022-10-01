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
Route::get('/Catalog', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/Book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/Member', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/Publisher', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/Author', [App\Http\Controllers\AuthorController::class, 'index']);