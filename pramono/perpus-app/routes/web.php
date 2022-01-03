<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    return view('landing.welcome');
});
Route::get('/about', function () {
    return view('landing.about');
});

Route::get('/service', function () {
    return view('landing.service');
});

Route::get('/contact', function () {
    return view('landing.contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::resource('catalog', App\Http\Controllers\CatalogController::class);
    Route::resource('book', App\Http\Controllers\BookController::class);
    Route::resource('publisher', App\Http\Controllers\PublisherController::class);
    Route::resource('writer', App\Http\Controllers\WriterController::class);
    Route::resource('member', App\Http\Controllers\MemberController::class);
    Route::resource('transaction', App\Http\Controllers\TransactionController::class);
    Route::resource('role_permissions', \App\Http\Controllers\RolePermissionController::class);
    // api url
    Route::get('get/writer', [\App\Http\Controllers\WriterController::class, 'getData']);
    Route::get('get/publisher', [\App\Http\Controllers\PublisherController::class, 'getData']);
    Route::get('get/member', [\App\Http\Controllers\MemberController::class, 'getData']);
    Route::get('get/book', [\App\Http\Controllers\BookController::class, 'getData']);
    Route::get('get/transaction', [\App\Http\Controllers\TransactionController::class, 'getData']);

});
