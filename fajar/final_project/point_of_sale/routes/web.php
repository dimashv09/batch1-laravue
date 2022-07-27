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
    //category
    Route::get('/category/data', [App\Http\Controllers\CategoryController::class, 'data'])->name('category.data');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    

    //product
    Route::get('/product/data', [App\Http\Controllers\ProductController::class, 'data'])->name('product.data');

    Route::post('/product/deleteSelected', [App\Http\Controllers\ProductController::class, 'deleteSelected'])->name('product.deleteSelected');  

    Route::post('/product/print-barcode', [App\Http\Controllers\ProductController::class, 'printBarcode'])->name('product.printBarcode');

    Route::resource('product', App\Http\Controllers\ProductController::class);


    //member
    Route::get('/member/data', [App\Http\Controllers\MemberController::class, 'data'])->name('member.data');
    Route::post('/member/print-member', [App\Http\Controllers\MemberController::class, 'printMember'])->name('member.printMember');
    Route::resource('member', App\Http\Controllers\MemberController::class);


    //supplier
    Route::get('/supplier/data', [App\Http\Controllers\SupplierController::class, 'data'])->name('supplier.data');
    Route::resource('supplier', App\Http\Controllers\SupplierController::class);


    //expenditure (pengeluaran)
    Route::get('/expenditure/data', [App\Http\Controllers\ExpenditureController::class, 'data'])->name('expenditure.data');
    Route::resource('expenditure', App\Http\Controllers\ExpenditureController::class);
    

    //purchase (pembelian)
    Route::get('/purchase/{id}/create', [App\Http\Controllers\PurchaseController::class, 'create'])->name('purchase.create');
    Route::get('/purchase/data', [App\Http\Controllers\PurchaseController::class, 'data'])->name('purchase.data');
    Route::resource('purchase',App\Http\Controllers\PurchaseController::class)->except('create');


    //Purchase Detail (pembelian detail)
    Route::get('/purchase_detail/loadForm/{discount}/{total}', [App\Http\Controllers\PurchaseDetailController::class, 'loadForm'])->name('purchase_detail.load_form');
    Route::get('/purchase_detail/{id}/data', [App\Http\Controllers\PurchaseDetailController::class, 'data'])->name('purchase_detail.data');
    Route::resource('purchase_detail',App\Http\Controllers\PurchaseDetailController::class)->except('create', 'show',  'edit');


    //Sale
    Route::get('/transaction/new', [App\Http\Controllers\SaleController::class, 'create'])->name('transaction.new');
    Route::resource('transaction',App\Http\Controllers\SalesDetailController::class)->except('show');

});