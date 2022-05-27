<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
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
        return view('anggota.index', compact('anggotas'));
    }

    public function api()
    {
        $anggotas = Anggota::all();
        $datatables = datatables()->of($anggotas)->addIndexColumn();

        return $datatables->make(true);
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
        $anggota = new Anggota();
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
            'email'=>'required',

        ]);

            $anggota->name = $request->name;
            $anggota->gender = $request->gender;
            $anggota->phone_number = $request->phone_number;
            $anggota->address = $request->address;
            $anggota->email = $request->email;
            $anggota->save();

            return redirect('anggota');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
            $anggota = Anggota::find($id);
            $anggota->name = $request->name;
            $anggota->gender = $request->gender;
            $anggota->phone_number = $request->phone_number;
            $anggota->address = $request->address;
            $anggota->email = $request->email;
            $anggota->save();

        return redirect('anggota');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota, $id)
    {
        
        // $this->validate($request,[
        //     'isbn'=>'required',
        //     'title'=>'required',
        //     'year'=>'required',
        //     'qty'=>'required',
        //     'price'=>'required',
        // ]);

            $anggota = Anggota::find($id);
            $anggota->name = $request->name;
            $anggota->gender = $request->gender;
            $anggota->phone_number = $request->phone_number;
            $anggota->address = $request->address;
            $anggota->email = $request->email;
            $anggota->save();


        // $anggota->update($request->all());

        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
        // $anggota->delete();

        // return redirect('anggota');
    }
}
