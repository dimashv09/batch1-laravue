<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\VarLikeIdentifier;

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
        ->rightJoin('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('transactions.date_start', '=', '06', 'and', 'transactions.date_end', '=', '06')
        ->get();
        
        // no 10
        $data10 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->leftJoin('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('members.address', 'like', '%CA%')
        ->get();

        // no 11
        $data11 = Member::select('name', 'phone_number', 'date_start', 'date_end')
        ->leftJoin('transactions', 'transactions.member_id', '=', 'member_id')
        ->where('members.address', 'like', '%CA%', 'and', 'members.gender', '=', 'P')
        ->get();

        // no 12
        $data12 = Member::select('name', 'phone_number', 'address', 'date_start', 'date_end', 'books.isbn', 'transaction_details.qty',)
        ->leftJoin('transactions', 'transactions.member_id', '=', 'member_id')
        ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        ->leftJoin('books', 'books.id', '=', 'transaction_details.book_id')
        ->where('transaction_details.qty', '>', 1 )
        ->get();

        // no 13
        $data13 = Member::select(DB::raw('transaction_details.qty * books.price AS total'),'name', 'phone_number', 'address', 'date_start', 'date_end', 'books.isbn', 'transaction_details.qty', 'books.title')
        ->join('transactions', 'transactions.member_id', '=', 'member_id')
        ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        ->leftJoin('books', 'books.id', '=', 'transaction_details.book_id')
        ->get();

        // no 14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'date_start', 'date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', 'authors.name', 'publishers.name', 'catalogs.name') 
        ->leftJoin('transactions', 'transactions.member_id', '=', 'member_id')
        ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
        ->leftJoin('books', 'books.id', '=', 'transaction_details.book_id')
        ->join('authors', 'authors.id', '=', 'books.author_id')
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
        ->get();

        // no 15
        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'catalogs.created_at', 'catalogs.updated_at', 'books.title')
        ->join('books', 'books.catalog_id', '=', 'catalogs.id')
        ->get();

        // no 16
        $data16 = Book::select('books.id', 'books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.author_id', 'books.qty', 'books.price', 'books.created_at', 'books.updated_at', 'publishers.name')
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->get();

        // no 17
        $data17 = Book::select('books.id', 'books.isbn', 'books.title', 'books.year', 'books.author_id', 'books.qty', 'authors.name')
        ->join('authors', 'authors.id', '=', 'books.author_id')
        ->where('authors.name', '=', 'Kayla Deckow')
        ->get();
        
        // no 18
        $data18 = Book::select('*')
        ->where('books.price', '>', '14565')
        ->get();
        
        // no 19
        $data19 = Book::select('books.id', 'books.isbn', 'books.title', 'books.year', 'books.author_id', 'books.publisher_id', 'books.catalog_id', 'books.qty', 'books.price', 'publishers.name')
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->where('publishers.name', '=', 'Bo Stark', 'and', 'books.qty', '>', 10)
        ->get();
        
        // no 20
        $data20 = Member::select('*')
        ->where('members.created_at', 'like', '%2023-08-04%')
        ->get();

        // return $data13;
        return view('home');
    }
}
