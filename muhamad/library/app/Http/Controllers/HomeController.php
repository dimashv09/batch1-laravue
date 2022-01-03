<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Catalog;
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
        // No.1
        $data1 = Member::select('*')
            ->rightJoin('users', 'users.member_id', '=', 'members.id')
            ->get();

        // No.2
        $data2 = Member::select('*')
            ->leftJoin('users', 'users.member_id', '=', 'members.id')
            ->where('users.id', null)
            ->get();

        // No.3
        $data3 = Member::select('members.id', 'members.name')
            ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('transactions.id', null)
            ->get();

        // No.4
        $data4 = Member::select('*')
            ->rightJoin('transactions', 'transactions.member_id', '=', 'members.id')
            ->get();

        // No.5
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
            ->leftJoin('transactions', 'transactions.member_id', 'members.id')
            ->groupBy('members.id', 'members.name', 'members.phone_number')
            ->having(DB::raw('count(transactions.member_id)'), '>', 1)
            ->get();

        // No.6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->get();

        // No.7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->where('transactions.date_end', '>', 20210600)
            ->get();

        // No.8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->where('transactions.date_start', '<', 20210600)
            ->get();

        // No.9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->where('transactions.date_start', '>', 20210600)
            ->where('transactions.date_end', '>', 20210600)
            ->get();

        // No.10
        $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->where('members.address', 'LIKE', '%bandung%')
            ->get();

        // No.11
        $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->where('members.address', 'LIKE', '%bandung%')
            ->where('members.gender', 'LIKE', '%p%')
            ->get();

        // No.12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty')
            ->leftJoin('transactions', 'transactions.member_id', 'members.id')
            ->leftJoin('transaction_details', 'transaction_details.transaction_id', 'transaction_details.id')
            ->leftJoin('books', 'transaction_details.book_id', 'books.id')
            ->where('books.qty', '>', 1)
            ->get();

        // No.13
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'books.price', DB::raw('transaction_details.qty * books.price as total'))
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->leftJoin('transaction_details', 'transaction_details.transaction_id', 'transaction_details.id')
            ->leftJoin('books', 'transaction_details.book_id', 'books.id')
            ->get();

        // No.14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.qty', 'books.title', 'books.price', 'publishers.name', 'authors.name', 'catalogs.name')
            ->rightJoin('transactions', 'transactions.member_id', 'members.id')
            ->leftJoin('transaction_details', 'transaction_details.transaction_id', 'transaction_details.id')
            ->leftJoin('books', 'transaction_details.book_id', 'books.id')
            ->leftJoin('publishers', 'publishers.id', 'books.publisher_id')
            ->leftJoin('authors', 'authors.id', 'books.author_id')
            ->leftJoin('catalogs', 'catalogs.id', 'books.catalog_id')
            ->get();

        // No.15
        $data15 = Catalog::select('catalogs.*', 'books.title')
            ->rightJoin('books', 'books.catalog_id', 'catalogs.id')
            ->get();

        // No.16
        $data16 = Book::select('books.*', 'publishers.name')
            ->leftJoin('publishers', 'publishers.id', 'books.publisher_id')
            ->get();

        // No.17
        $data17 = Book::select(DB::raw('COUNT(author_id) AS PG05'))
            ->where('author_id', 5)
            ->get();

        // No.18
        $data18 = Book::select('*')
            ->where('price', '>', 10000)
            ->get();

        // No.19
        $data19 = Book::select('*')
            ->where('publisher_id', 1)
            ->where('qty', '>', 10)
            ->get();

        // No.20
        $data20 = Member::select('*')
            ->where('created_at', '>', 20210600)
            ->get();

        // return $data20;
        // return transactionAlert();
        return view('home');
    }
}
