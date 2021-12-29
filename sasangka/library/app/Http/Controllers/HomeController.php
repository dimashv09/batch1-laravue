<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $books = Book::with('publisher')->with('catalog')->with('author')->get();
        // $transaction = Transaction::with('transactionDetail')->get();
        // return $transaction;

        // No 1
        $data1 = Member::select('*')
                ->join('users', 'users.member_id', '=', 'members.id')
                ->get();

        // No 2
        $data2 = Member::select('*')
                ->leftJoin('users', 'users.member_id', '=', 'members.id')
                ->where('users.id', NULL)
                ->get();

        // No 3
        $data3 = Transaction::select('members.id', 'members.name')
                ->rightJoin('members', 'members.id', 'transactions.member_id')
                ->where('transactions.member_id', NULL)
                ->get();

        // No 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->orderBy('members.id', 'asc')
                ->get();

        // No 5
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->having(DB::raw('count(transactions.member_id)'), '>', 1)
                ->groupBy('members.id', 'members.name', 'members.phone_number')
                ->get();

        // No 6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->get();

        // No 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->whereMonth('transactions.date_end', 6)
                ->get();

        // No 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->whereMonth('transactions.date_start', 5)
                ->get();

        // No 9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->whereMonth('transactions.date_start', 6)
                ->whereMonth('transactions.date_end', 6)
                ->get();

        // No 10
        $data10 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->rightJoin('members', 'members.id', 'transactions.member_id')
                ->where('members.address', 'like', '%Bandung%')
                ->get();

        // No 11
        $data11 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                ->rightJoin('members', 'members.id', 'transactions.member_id')
                ->where('members.address', 'like', '%Bandung%')
                ->where('members.gender', 'F')
                ->get();

        // No 12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.quantity')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->where('transaction_details.quantity', '>', 1)
                ->get();

        // No 13
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.quantity', 'books.title', 'books.price', DB::raw('transaction_details.quantity * books.price AS total_price'))
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->get();
                
        // No 14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.quantity', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
                ->join('transactions', 'transactions.member_id', 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id', 'transactions.id')
                ->join('books', 'books.id', 'transaction_details.book_id')
                ->join('publishers', 'publishers.id', 'books.publisher_id')
                ->join('authors', 'authors.id', 'books.author_id')
                ->join('catalogs', 'catalogs.id', 'books.catalog_id')
                ->get();

        // No 15
        $data15 = Catalog::select('catalogs.*', 'books.title')
                ->rightJoin('books', 'books.catalog_id', 'catalogs.id')
                ->get();

        // No 16
        $data16 = Book::select('books.*', 'publishers.name')
                ->leftJoin('publishers', 'publishers.id', 'books.publisher_id')
                ->get();

        // No 17
        $data17 = Book::select(DB::raw('COUNT(books.author_id) AS PG05'))
                ->where('books.author_id', 5)
                ->get();

        // No 18
        $data18 = Book::select('*')
                ->where('price', '>', 10000)
                ->get();

        // No 19
        $data19 = Book::select('*')
                ->where('books.quantity', '>', 10)
                ->where('books.publisher_id', 1)
                ->get();

        // No 20
        $data20 = Member::select('*')
                ->whereMonth('created_at', '>=', 6)
                ->get();

        ///return $data4;
        return view('home');
    }
}