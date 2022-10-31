<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class Authorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Authors = Author::all();
       // return $Authors;
        return view('admin.Author.index', compact('Authors'));
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
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $Author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $Author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $Author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $Author)
    {
        //
    }
}
