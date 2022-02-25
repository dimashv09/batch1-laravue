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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);

Route::get('/api/author', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publisher', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/member', [App\Http\Controllers\MemberController::class, 'api']);

Route::resource('/author', App\Http\Controllers\AuthorController::class);
// Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
// Route::get('/author/create', [App\Http\Controllers\AuthorController::class, 'create']);
// Route::post('/author', [App\Http\Contauthorrollers\AuthorController::class, 'store']);
// Route::get('/author/{author}/edit', [App\Http\Controllers\AuthorController::class, 'edit']);
// Route::put('/author/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
// Route::delete('/author/{author}', [App\Http\Controllers\AuthorController::class, 'destroy']);

Route::resource('/publisher', App\Http\Controllers\PublisherController::class);
// Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index']);
// Route::get('/publisher/create', [App\Http\Controllers\PublisherController::class, 'create']);
// Route::post('/publisher', [App\Http\Controllers\PublisherController::class, 'store']);
// Route::get('/publisher/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
// Route::put('/publisher/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
// Route::delete('/publisher/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);

Route::resource('/catalog', App\Http\Controllers\CatalogController::class);
// Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalog/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalog', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalog/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalog/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalog/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);