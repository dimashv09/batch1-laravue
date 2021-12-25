<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publisher', compact('publishers'));
    }

    public function api()
    {
        $publishers = Publisher::all();

        // Insert data using Yajra DataTable instead of PHP Syntax
        $datatables = datatables()->of($publishers)
            ->addColumn('date', function ($publisher) {
                return convertDate($publisher->created_at);
            })->addIndexColumn();

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
        // Validation data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32',
            'email' => 'required|unique:publishers',
            'phone_number' => 'required|unique:publishers|min:12|max:15',
            'address' => 'required'
        ]);

        // Insert validated data into database
        Publisher::create($validator);

        return redirect('publishers')->with('success', 'New publisher data has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        //Validation data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32',
            'email' => "required|email:dns|unique:publishers,email,{$publisher->id}",
            'phone_number' => "required|unique:publishers,phone_number,{$publisher->id}|min:12|max:15",
            'address' => 'required'
        ]);

        // Insert validated data into database
        $publisher->update($validator);

        return redirect('publishers')->with('success', 'publisher data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        // Delete data with specific ID
        $publisher->delete();

        return redirect('publishers')->with('success', 'Publisher data has been Deleted');
    }
}
