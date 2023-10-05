<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Catalog;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();

        return view('admin.book', compact('publishers', 'authors', 'catalogs'));
    }

    public function api()
    {
        $books = Book::all();
        
        return json_encode($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'isbn' => ['required'],
            'title' => ['required'],
            'year' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'catalog_id' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
        ]);

        Book::create($request->all());

        return redirect('books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.book.', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'isbn' => ['required'],
            'title' => ['required'],
            'year' => ['required'],
            'publisher_id' => ['required'],
            'author_id' => ['required'],
            'catalog_id' => ['required'],
            'qty' => ['required'],
            'price' => ['required'],
        ]);

        // $book->update($request->all());
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
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
    
        $book->delete();

        return redirect('books');

    }
}
