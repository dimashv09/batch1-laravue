<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreWriterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWriterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Writer  $writer
     * @return \Illuminate\Http\Response
     */
    public function show(Writer $writer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Writer  $writer
     * @return \Illuminate\Http\Response
     */
    public function edit(Writer $writer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWriterRequest  $request
     * @param  \App\Models\Writer  $writer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Writer  $writer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Writer $writer)
    {
        //
    }
}
