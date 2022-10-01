<?php

namespace App\Http\Controllers;

use App\Models\Pubisher;
use Illuminate\Http\Request;

class Publishercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Publisher.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pubisher  $pubisher
     * @return \Illuminate\Http\Response
     */
    public function show(Pubisher $pubisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pubisher  $pubisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Pubisher $pubisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pubisher  $pubisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pubisher $pubisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pubisher  $pubisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pubisher $pubisher)
    {
        //
    }
}
