<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::with('publisher')->get();
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        
        return view('book.index', compact('publishers','authors','catalogs'));
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
        //
        $book = new Book();
        $this->validate($request,[
            'isbn'=>'required',
            'title'=>'required',
            'year'=>'required',
            'qty'=>'required',
            'price'=>'required',
            
        ]);

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->year = $request->year;
        $book->publisher_id = $request->publisher_id;
        $book->author_id = $request->author_id;
        $book->catalog_id = $request->catalog_id;
        $book->qty = $request->qty;
        $book->price = $request->price;
        $book->save();

        return redirect('books');

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
        //
        $this->validate($request,[
            'isbn'=>'required',
            'title'=>'required',
            'year'=>'required',
            'qty'=>'required',
            'price'=>'required',
            
        ]);

        $book->update($request->all());

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
