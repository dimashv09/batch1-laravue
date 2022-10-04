<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Member;
//use App\Models\Book;
//use App\Models\Publisher;
//use App\Models\Author;
//use App\Models\Catalog;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$Members = Member :: All();
        //$Members = Member :: with ('user')->get();
        //$Books = Book::with ('Publisher')->get();
        //$Publishers = Publisher :: with ('Books')->get();
        //$Books = Book :: with ('Author')->get();
        //$Authors = Author :: with ('Books')->get();
        //$Books = Book :: with ('Catalog')->get();
        //$Catalog = Catalog :: with ('Books')->get();
        $Transactions = Transaction :: with ('Member')->get();


        return $Transactions; 
        return view('home');
    }
}
