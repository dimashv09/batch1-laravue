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
        $publishers = Publisher::with('books')->get();
        // return $publishers;
        return view('publisher.index',compact('publishers'));
    }

    public function api()
    {
        $publishers = Publisher::all();
        $datatables = datatables()->of($publishers)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher = new Publisher();

        $this->validate($request,[
            'name' => 'required|max:150',
            'email' => 'required|max:50',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ]);

        $publisher->name = $request->name;
        $publisher->email = $request->email;
        $publisher->phone_number = $request->phone_number;
        $publisher->address = $request->address;
        $publisher->save();

        return redirect('publishers');
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
    public function edit(Publisher $publisher, $id)
    {
        $publisher = Publisher::find($id);
        return view('publisher.edit', compact('publisher'));
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
        // $publisher = Publisher::find($publisher);
        $this->validate($request,[
            'name' => 'required|max:150',
            'email' => 'required|max:50',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ]);

        // $publisher->name = $request->name;
        // $publisher->email = $request->email;
        // $publisher->phone_number = $request->phone_number;
        // $publisher->address = $request->address;
        $publisher->update($request->all());
        // $publisher->save();

        return redirect('publishers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        // $publisher = Publisher::find($id);
        $publisher->delete();
        return redirect('publishers');
    }
}
