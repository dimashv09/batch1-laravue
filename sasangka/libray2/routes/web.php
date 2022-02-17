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
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//transaction
Route::get('api/transactions', [App\Http\Controllers\TransactionControllers::class, 'index']);
//author
Route::resource('/authors',App\Http\Controllers\AuthorController::class);
Route::get('/api/authors',[App\Http\Controllers\AuthorController::class,'api']);
//publisher
Route::get('/api/publishers',[App\Http\Controllers\PublisherController::class,'api']);
Route::resource('/publishers',App\Http\Controllers\PublisherController::class);
//books
Route::resource('/books', App\Http\Controllers\BookController::class);
Route::get('/api/books',[App\Http\Controllers\BookController::class,'api']);
//member
Route::get('members', [App\Http\Controllers\MemberController::class, 'index']);
Route::resource('/members', App\Http\Controllers\MemberController::class,);
Route::get('/api/members',[App\Http\Controllers\MembersController::class,'api']);
//catalog
Route::resource('/catalogs',App\Http\Controllers\CatalogController::class);

