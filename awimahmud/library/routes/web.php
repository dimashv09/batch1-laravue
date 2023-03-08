<?php

use Spatie\Permission\Models\Role;
// use App\Models\User;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;


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

// Route::get('test', function() {
//     $role = Role::where('id', 3)->first();
//     $permision = Permission::findById(4);
//     $role->givePermissionTo($permision);
// });

// Route::get('test_spatie', function () {
//     $user = User::findOrFail(4);

//     $user->assignRole('petugas');

//     // return $user;
// });

// $role = Role::findOrFail(1);
// Auth::login($role);


// Route::get('/transactions', function() {
//     view('admin.transaction.index');
// })->middleware('role:p');

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

Route::resource('/books', BookController::class);
Route::get('/api/books', [BookController::class, 'api']);

Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'api']);
  
  
Route::resource('publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class, 'api']);

Route::resource('authors', AuthorController::class);
Route::get('/api/authors', [AuthorController::class, 'api']);

Route::get('/home', [AdminController::class, 'dashboard']);

Route::resource('/transactions', TransactionController::class);
Route::get('/api/transactions', [TransactionController::class, 'api']);

Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index']);



Route::get('/test_spatie', [AdminController::class, 'test_spatie']);