<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
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
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        return view('admin.book',compact('publishers','authors','catalogs'));
    }

    public function api()
    {
        $books = Book::all();
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
        // Validation Data
        $validator = $request->validate([
            'isbn' => 'required|unique:books|max:9',
            'title' => 'required',
            'year' => 'required|min:2|max:4',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'quantity' => 'required|min:1|max:4',
            'price' => 'required|min:1|max:11',
        ]);

        // Insert validated data into database
        $book = Book::create($validator);

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
        // Validation Data
        $validator = $request->validate([
            'isbn' => "required|unique:books,isbn,{$book->id}|max:9",
            'title' => 'required',
            'year' => 'required|min:2|max:4',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'quantity' => 'required|min:1|max:4',
            'price' => 'required|min:1|max:11',
        ]);

        // Insert validated data into database
        $book->update($validator);

        return redirect('books')->with('success', 'book data has been Updated');
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
