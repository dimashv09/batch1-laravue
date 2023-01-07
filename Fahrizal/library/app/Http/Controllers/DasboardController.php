<?php

namespace App\Http\Controllers;

use App\Models\Dasboard;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dasboard.index');
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
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dasboard $dasboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dasboard $dasboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dasboard $dasboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dasboard  $dasboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dasboard $dasboard)
    {
        //
    }
}