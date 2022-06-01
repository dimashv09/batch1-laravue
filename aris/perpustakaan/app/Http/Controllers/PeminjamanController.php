<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response        
     */
    public function index()
    {
        //
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        $peminjamans = Peminjaman::with('anggota')->get();
        // return $peminjamans;
        return view('Peminjaman.index', compact('peminjamans','anggotas','bukus'));
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
        $peminjaman = new Peminjaman();

        $this->validate($request,[
            'id_anggota' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status'=>'required',
            'id_buku' => 'required',


        ]);

        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->date_start = $request->date_start;
        $peminjaman->date_end = $request->date_end;
        $peminjaman->status = $request->status;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->save();

        return redirect('peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
