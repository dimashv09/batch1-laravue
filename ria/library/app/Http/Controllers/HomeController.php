<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
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
        //$members = Member::with('user')->get();
        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('books')->get();
        //$authors = Author::with('books')->get();
        //$catalogs = Catalog::with('books')->get();
        //$transactions = Transaction::with('transactions')->get();

        // no 1
        $data = Member::select('*')
                        ->join('users','users.member_id','=','members.id')
                        ->get();

        // no 2
        $data2 = Member::select('*')
                        ->join('users','users.member_id','=','members.id')
                        ->where('users.id', '=', NULL)
                        ->get();

        // no 3
        $data3 = Transaction::select('members.id', 'members.name')
                            ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                            ->where('transactions.member_id', NULL)
                            ->get();

        // no 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->orderBy('members.id', 'asc')
                        ->get();

        // no 5
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                        ->leftJoin('transactions', 'transactions.member_id', 'members.id')
                        ->groupBy('members.id', 'members.name', 'members.phone_number')
                        ->having(Member::raw('count(transactions.member_id)'), '>', 1)
                        ->get();
         
        // no 6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->get();

        // no 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->where('transactions.date_end', 'like', '06-2021%')
                        ->get();

        // no 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('transactions.date_start', 'like', '05-2021%')
                    ->get();

        // no 9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('transactions.date_start', 'like', '06-2021%')
                    ->where('transactions.date_end', 'like', '06-2021%')
                    ->get();

        // no 10
        $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('members.address', 'like', 'bandung%')
                    ->get();

        // no 11
        $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->where('members.address', 'like', 'bandung%')
                    ->where('members.gender', 'like', 'p%')
                    ->get();

        // no 12
        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->where('transaction_details.qty', '<>', 1)
                    ->get();

        // no 13
        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', Member::raw('transaction_details.qty * books.price as total'))
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->get();

        // no 14
        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'authors.name', 'publishers.name', 'catalogs.name')
                    ->join('transactions', 'transactions.member_id', '=', 'members.id')
                    ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('books', 'transaction_details.book_id', '=', 'books.id')
                    ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                    ->join('authors', 'books.author_id', '=', 'authors.id')
                    ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
                    ->get();

        // no 15
        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')
                        ->join('books', 'catalogs.id', '=', 'books.catalog_id')
                        ->get();

        // no 16
        $data16 = Book::select('books.id', 'books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price')
                        ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                        ->where('books.publisher_id', '=', NULL)
                        ->get();

        // no 17
        $data17 = Book::select('*')
                        ->where('author_id', '=', 'PG05')
                        ->get();

        // no 18
        $data18 = Book::select('*')
                        ->where('price', '>', 10000)
                        ->get();

        // no 19
        $data19 = Book::select('*')
                        ->where('publisher_id', '=', 'Penerbit 01')
                        ->where('qty', '>', 10)
                        ->get();

        // no 20
        $data20 = Member::select('*')
                        ->where('created_at', '=', '06-2021%')
                        ->get();

        //return $data20;
        return view('home');
    }
}
