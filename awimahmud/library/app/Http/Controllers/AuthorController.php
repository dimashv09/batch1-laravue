<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.author.index');
    }

    public function api()
    {
        $authors = Author::all();
        
        // foreach ($authors as $key => $author) {
        //     $author->date = convert_date($author->created_at);
        // }
        
        $datatables = datatables()->of($authors)
                                ->addColumn('date', function($author) {
                                    return convert_date($author->created_at);
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric|digits:12',
            'address' => 'required',
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric|digits:12',
            'address' => 'required',
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
        $author->delete();
    }
}