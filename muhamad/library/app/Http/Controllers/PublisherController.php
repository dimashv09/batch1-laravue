<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validation data
        $validator = $request->validate([
            'name' => 'required|min:3|max:32',
            'email' => 'required',
            'phone_number' => 'required|min:12',
            'address' => 'required'
        ]);

        // Insert validated data into database
        Publisher::create($validator);

        return redirect('publishers')->with('success', 'New publisher has been Added');
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
        return view('admin.publisher.edit', compact('publisher'));
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
        // Create Rules
        $rules = [
            'name' => 'required|min:3|max:32',
            'address' => 'required'
        ];

        // Check if there is unique data changed
        if ($request->email != $publisher->email) {
            $rules['email'] = 'required|unique:publishers';
        } else if ($request->phone_number != $publisher->phone_number) {
            $rules['phone_number'] = 'required|unique:publishers|min:12';
        }

        //Validation data
        $validator = $request->validate($rules);

        // Insert validated data into database
        $publisher->update($validator);

        return redirect('publishers')->with('success', 'publisher table has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete(); // Delete data with specific ID

        return redirect('publishers')->with('success', 'Publisher has been Deleted');
    }
}
