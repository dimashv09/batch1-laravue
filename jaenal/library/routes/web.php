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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/Catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/Books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/Members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/Publishers', [App\Http\Controllers\PublisherController::class, 'index']);
Route::get('/Authors', [App\Http\Controllers\AuthorController::class, 'index']);

Route::get('/Catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/Catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/Catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/Catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/Catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);