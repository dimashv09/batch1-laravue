<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Dasboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    public function dasboard()
    {
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_pengarang = Author::count();
        $total_penerbit = Publisher::count();

        $data_donut = Book::select(DB::raw("COUNT(id) as total "))->groupBy('id')->ordeBy('id', 'asc')->pluck('total');
        $label_donut = Publisher::select(DB::raw("COUNT(id) as total "))->groupBy('id')->ordeBy('id', 'asc')->pluck('total');

        //$label_bar = ['Author'];
        //$data_bar = [];
        //
        //foreach ($label_bar as $key => $value) {
        //    $data_bar[$key]['label'] = $label_bar[$key];
        //    $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0,0)';
        //    $data_month = [];
        //    foreach (range(1, 12) as $month) {
        //        $data_month[] = Author::select(DB::raw("COUNT(*) as total"))->where('tgl_pi', $month)->first()->total;
        //    }
        //    $data_bar[$key]['data'] = $data_month;
        //}

        return view('admin.dasboard', compact('total_anggota', 'total_buku', 'total_pengarang', 'total_penerbit'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dasboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dasboard $dasboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dasboard $dasboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dasboard $dasboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dasboard $dasboard)
    {
        //
    }
}
