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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publishers = Publisher::with('books')->get();
        return view('admin.publisher.publisher', compact('publishers'));
    }

    public function api()
    {
        $publishers = Publisher::all();
        $datatables = datatables()->of($publishers)
            ->addColumn('date', function ($publisher) {
                return convert_date($publisher->created_at);
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
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:10'],
            'email' => ['required', 'email', 'unique:publishers'],
            'address' => ['required']
        ]);
        $create = Publisher::create($request->all());
        if ($create) {
            return redirect('publishers');
        }
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
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'phone_number' => ['required', 'min:10'],
            'email' => ['required', 'email', 'unique:publishers,email,' . $publisher->id],
            'address' => ['required']
        ]);
        $publisher->update($request->all());
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
        $publisher->delete();
        return redirect('publishers');
    }
}
?>