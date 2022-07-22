<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.expenditure.index');
    }

    public function data()
    {
        $expenditure = Expenditure::orderBy('id', 'desc')->get();
        
        return datatables()
            ->of($expenditure)
            ->addIndexColumn()
            ->addColumn('created_at', function($expenditure){
                return dateFormat($expenditure->created_at);
            })
            ->addColumn('nominal', function($expenditure){
                return money_format($expenditure->nominal);
            })
            ->addColumn('aksi', function ($expenditure) {
                return '<button type="button" onclick="editForm(`'. route('expenditure.update', $expenditure->id) .'`)" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i>
                    </button>
                    <button type="button" onclick="deleteData(`'. route('expenditure.destroy', $expenditure->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
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
        $expenditure = Expenditure::create($request->all());

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenditure = Expenditure::find($id);

        return response()->json($expenditure);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expenditure = Expenditure::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenditure = Expenditure::find($id);
        $expenditure->delete();

        return response(null, 204);
    }
}
