<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;

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


//prefix "admin"
Route::prefix('admin')->group(function () { 
    
   //middleware auth
   Route::group(['middleware'=> ['auth']], function(){
        //route catalogs
        Route::resource('/catalogs', CatalogController::class)
            ->middleware('permission:catalog.index|catalog.create|catalog.edit|catalog.delete');

        //route books
        Route::resource('/books', BookController::class)
            ->middleware('permission:book.index|book.create');
        Route::get('/api/books', [BookController::class, 'api']);

        //route members
        Route::resource('/members', MemberController::class)
            ->middleware('permission:member.index|member.create|member.edit|member.delete');
        Route::get('/api/members', [MemberController::class, 'api']);

        //route pulishers
        Route::resource('publishers', PublisherController::class)
            ->middleware('permission:pubisher.index|publisher.create|publisher.edit|publisher.delete');
        Route::get('/api/publishers', [PublisherController::class, 'api']);

        //route authors
        Route::resource('authors', AuthorController::class)
            ->middleware('permission:author.index|author.create');
        Route::get('/api/authors', [AuthorController::class, 'api']);

        //route transacions
        Route::resource('/transactions', TransactionController::class)
            ->middleware('permission:admin.transaction.index|transaction.create|transaction.edit|transaction.delete|transaction.detail');
        Route::get('/api/transactions', [TransactionController::class, 'api']);

        //route categories
        Route::resource('/categories', CategoryController::class)->middleware('permssion:category.index');

        //route home
        Route::get('/home', [AdminController::class, 'dashboard'])
            ->middleware('permission:dashboard');
            
        //route test spatie for assgin role and permission to database
        Route::get('/test_spatie', [AdminController::class, 'test_spatie']);
   }); 
});