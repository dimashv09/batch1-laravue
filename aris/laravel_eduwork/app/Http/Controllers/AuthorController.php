<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        if (auth()->user()->can('index transaction')){
             return view('author.index');
        }else{
            return abort('403');
        }
       
    }

    public function api()
    {
        $authors = Author::all();

        // foreach($authors as $key=>$author){
        //     $author->date = dateFormat($author->created_at);
        // }
        $datatables = datatables()->of($authors)
        ->addColumn('date', function($author){
            return dateFormat($author->created_at);
        })
        ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('author.create');
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
        $author = new Author();
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|max:50',
            'phone_number'=>'required|max:15',
            'address' =>'required',
        ]);

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone_number = $request->phone_number;
        $author->address = $request->address;
        $author->save();

        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        // $author = Author::find($author);
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|max:50',
            'phone_number'=>'required|max:15',
            'address' =>'required',
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
    public function destroy(Author $author)
    {
        // $author = Author::find($author);
        $author->delete();

        return redirect('authors');
    }
}
