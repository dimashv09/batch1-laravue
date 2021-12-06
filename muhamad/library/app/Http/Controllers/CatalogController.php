<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.catalog.index', compact('catalogs'));
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
        // INSERT METHOD NO.1 (Tingker)
        // $catalog = new Catalog;
        // $catalog->name = $request->name;
        // $catalog->save();

        // INSERT METHOD NO.2
        // Catalog::create($request->all());

        // Validation data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32'
        ]);

        // Insert validated data into database
        Catalog::create($validator);

        return redirect('catalogs')->with('success', 'New catalog has been created');
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
        // Validation data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32'
        ]);

        // Insert validated data into database
        $catalog->update($validator);

        return redirect('catalogs')->with('success', 'Catalog has been Updated');
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
