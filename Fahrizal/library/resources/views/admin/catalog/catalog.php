<?php

namespace App\Http\Controllers;


use App\Models\Catalog;
use App\Models\Book;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();
        return $books;
        return $this->hasMany('App\Models\Book', 'author_id');
    }
}