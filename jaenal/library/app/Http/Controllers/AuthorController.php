<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class Authorcontroller extends Controller
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
       // return $authors;
        return view('admin.author',);
    }

    
    public function api()
    {
        $authors = Author :: all();
        $datatables = datatables()->of($authors)->addIndexColumn();

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
        $this->validate($request,[
            'name' => ['required'], 
            'email' => ['required'],
            'phone_Number' => ['required'],
            'address' => ['required'],
        ]);

        Author::create($request->all());

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
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
    public function update(Request $request, author $author)
    {
        $this->validate($request,[
            'name' => ['required'], 
            'email' => ['required'],
            'phone_Number' => ['required'],
            'address' => ['required'],
        ]);

        $author->update($request->all());

        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author->delete();
    }
}
