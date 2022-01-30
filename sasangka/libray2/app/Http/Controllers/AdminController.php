<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Buku;
use App\Models\Katalog;
use App\Models\Anggota;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Peminjam;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    
   public function dashboard()
        $total_anggota = Anggota: :count ();
        $total buku = Buku::count ();
        $total peninjaman Peminjaman: wheretonth("tgl_pinjam', date('m"))->count();
        $total penerbit Penerbit::count();
        

        $data donut = Buku::select(D8::raw("COUNT (id_penerbit) as total"))->groupBy ('1d_penerbit")->orderBy("id penerbit', 'asc')->pluck('total');
        $label_donut = Penerbit::orderBy('penerbits.id', 'asc')->join('bukus', 'bukus.id_penerbit', '-', 'penerbits.id')-groupBy('nama_penerbit')->pluck('nama_penerbit');
        $label_bar = ('Peminjaman');
        $data bar   =[]
        foreach ($label_bar as $key => $value) {
        $data bar[$key]['label']- $label_bar[$key);
        $data bar[$key][ 'backgroundcolor'] rgba(60, 141,188,0.9);
        $data_month =[];

        foreach (range(1,12) as $month) {
            $data_month[] = Peminjaman::select(DB::raw("COUNT(*)total"))->whereMonth('tgl_pinjam,$month')->first()->total;
        }
        $data_bar[$key]['data'] = $data_month;
    {
    return view('admin.dashboard',compact('total buku','total_anggota','total_peminjam','total penebit'));
}
public function catalog()
{ 
$data_catalog = catalog::all();
 return view('admin.catalog.catalog',compact('data_catalog'));
}
public function penerbit()
{
    return view('admin.publisher');
}
public function pengarang()
{
    return view ()
}