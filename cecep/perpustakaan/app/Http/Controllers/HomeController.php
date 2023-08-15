<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Member;
use Illuminate\Http\Request;

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
        // $members = Member::with('user')->get();
        // $books = Book::with('publisher')->get();
        // $publishers = Publisher::with('books')->get();
        // $authors = Author::with('books')->get();
        // $books = Book::with('catalog')->get();
        // $catalogs = Catalog::with('books')->get();
        // $transactions = Transaction::with('member')->get();
        // $members = Member::with('transaction')->get();


        // Query builder
        // no 5
        $data5 = Member::select('*')
                    ->join('users', 'users.member_id', '=','member_id')
                    ->get();

        // no 6
        $data6 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->join('transactions', 'transactions.member_id', '=', 'member_id')
        ->get();

        // no 7
        $data7 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->join('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('transactions.date_end', '=', '06')
        ->get();

        // no 8
        $data8 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->join('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('transactions.date_start', '=', '05')
        ->get();

        // no 9
        $data9 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->join('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('transactions.date_start', '=', '06', 'and', 'transactions.date_end', '=', '06')
        ->get();

        // no 10
        // $data10 = 


        // return $data9;
        return view('home');
    }
}
