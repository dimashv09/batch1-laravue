<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.catalog.index', compact('catalogs'));
    }

    public function create()
    {
        return view('admin.catalog.create');
    }

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

    public function edit(Catalog $catalog)
    {
        return view('admin.catalog.edit', compact('catalog'));
    }

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

    public function destroy(Catalog $catalog)
    {
        // Catalog::destroy($catalog->id);
        $catalog->delete(); // Delete data with specific ID

        return redirect('catalogs')->with('success', 'Catalog has been Deleted');
    }
}
