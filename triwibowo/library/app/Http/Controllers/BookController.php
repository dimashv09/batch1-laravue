<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();

        return view('admin.books.index',compact('publishers', 'authors', 'catalogs'), [
            'judul' => 'Book'
        ]);
    }

    public function api()
    {
        $books = Book::with('author', 'publisher', 'catalog')->latest()->get();

        return json_encode($books);
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
            'isbn' => 'required|min:3|numeric',
            'title' => 'required',
            'year' => 'required|numeric',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            
        ]);

        $book = Book::create($request->all());

        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'isbn' => 'required|min:3|numeric',
            'title' => 'required',
            'year' => 'required|numeric',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric', 
        ]);

        $book->update($request->all());

        return response()->json('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
    }
}
