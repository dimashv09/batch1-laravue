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



Route::group(['middleware' => 'auth'], function (){
    Route::get('/category/data', [App\Http\Controllers\CategoryController::class, 'data'])->name('category.data');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    
    //product
    Route::get('/product/data', [App\Http\Controllers\ProductController::class, 'data'])->name('product.data');

    Route::post('/product/deleteSelected', [App\Http\Controllers\ProductController::class, 'deleteSelected'])->name('product.deleteSelected');  

    Route::post('/product/print-barcode', [App\Http\Controllers\ProductController::class, 'printBarcode'])->name('product.printBarcode');

    Route::resource('product', App\Http\Controllers\ProductController::class);
    
});