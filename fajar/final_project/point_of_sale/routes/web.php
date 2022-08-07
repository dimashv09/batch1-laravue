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

// Route::get('/', function () {
//     return redirect()->route('dahboard');
// });

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function (){

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('home', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    //ROUTE ADMIN
    Route::group(['middleware' => ['role:admin']], function (){

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

    //report
    Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');

    Route::get('report/data/{awal}/{akhir}', [App\Http\Controllers\ReportController::class, 'data'])->name('report.data');
    
    Route::get('report/pdf/{awal}/{akhir}', [App\Http\Controllers\ReportController::class, 'exportPDF'])->name('report.export_pdf');

    //user
    Route::get('/user/data', [App\Http\Controllers\UserController::class, 'data'])->name('user.data');
    Route::resource('user', App\Http\Controllers\UserController::class);


    //setting
    Route::get('setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');

    Route::get('setting/first', [App\Http\Controllers\SettingController::class, 'show'])->name('setting.show');

    Route::post('setting', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');


    }); //end route role == admin



    //sales
    Route::get('sales/data', [App\Http\Controllers\SaleController::class, 'data'])->name('sales.data');

    Route::get('sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sales.index');

    Route::get('sales/{id}', [App\Http\Controllers\SaleController::class, 'show'])->name('sales.show');

    Route::delete('sales/{id}', [App\Http\Controllers\SaleController::class, 'destroy'])->name('sales.delete');

    //sales transaction
    Route::get('/transaction/new', [App\Http\Controllers\SaleController::class, 'create'])->name('transaction.new');
    Route::post('/transaction/save', [App\Http\Controllers\SaleController::class, 'store'])->name('transaction.save');
    Route::get('/transaction/finish', [App\Http\Controllers\SaleController::class, 'finish'])->name('transaction.finish');

    //nota kecil
    Route::get('/transaction/nota-kecil', [App\Http\Controllers\SaleController::class, 'notaKecil'])->name('transaction.nota_kecil');
    //nota besar
    Route::get('/transaction/nota-besar', [App\Http\Controllers\SaleController::class, 'notaBesar'])->name('transaction.nota_besar');
    

    //detail Transaction
    Route::get('/transaction/{id}/data', [App\Http\Controllers\SalesDetailController::class, 'data'])->name('transaction.data');

    Route::get('/transaction/loadForm/{discount}/{total}/{received}', [App\Http\Controllers\SalesDetailController::class, 'loadForm'])->name('transaction.load_form');

    Route::resource('transaction',App\Http\Controllers\SalesDetailController::class)->except('show');
});