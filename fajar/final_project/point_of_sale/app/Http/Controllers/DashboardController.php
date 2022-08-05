<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $product = Product::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d'); 
        
        if (auth()->user()->role('admin')){
            return view('dashboard', compact('category', 'product', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir'));

        }else{
            return view('pages.kasir.dashboard');
        }
    }
}
