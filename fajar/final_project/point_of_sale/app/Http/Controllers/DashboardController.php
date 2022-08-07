<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Member;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Expenditure;
use Auth;

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

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            // dd($data_tanggal);

            $total_penjualan = Sale::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('paid');
            $total_pembelian = Purchase::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('paid');
            $total_pengeluaran = Expenditure::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }
        $tanggal_awal = date('Y-m-01');

        
        if (auth()->user()->hasRole('admin')){
            return view('dashboard', compact('category', 'product', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir',  'data_tanggal', 'data_pendapatan'));

        }else{
            return view('pages.kasir.dashboard');
        }
    }
}
