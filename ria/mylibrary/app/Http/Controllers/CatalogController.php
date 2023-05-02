<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct()
    {
        //keamanan jika sudah logon
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $catalogs = Catalog::all();

       // return $catalogs; tes data dr database
       return view('admin.catalog.index',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //keamaanan this
        $this->validate($request,[
            'name'      =>['required'],
        ]);
        
        //cara save data 1
        // $catalog = new Catalog;
        // $catalog->name = $request->name;
        // $catalog->save();
        
        Catalog::create($request->all());
        // cara ke 2 diatas lebih simpel jgn lupa tambahkan proteec filabe di model catalog

        return redirect ('catalogs');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
          return view('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
         $this->validate($request,[
            'name'      =>['required'],
        ]);

        $catalog->update($request->all());
        

        return redirect ('catalogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        // Catalog::destroy($catalog->id);
        $catalog->delete(); // Delete data with specific ID

        return redirect('catalogs')->with('success', 'Catalog has been Deleted');
    }
}