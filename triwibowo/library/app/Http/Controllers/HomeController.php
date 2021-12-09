<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
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
        // $member = Member::with('author')->get();
        // return $member;

        // No 1
        $data1 = Member::select('*')
            ->join('users', 'users.member_id', '=', 'members.id')
            ->get();

        // No 2
        $data2 = Member::select('*')
            ->whereNotExists(function ($query) {
                $query
                    ->select('id')
                    ->from('users')
                    ->whereRaw('users.member_id = members.id');
            })
            ->get();

        // no 3
        $data3 = Member::select('*')
            ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
            ->whereNotExists(function ($query) {
                $query
                    ->select('id')
                    ->from('transactions')
                    ->WhereRaw('transactions.member_id = members.id');
            })->get();

        $data4 = DB::table('members')
            ->join('transactions', 'members.id', '=', 'transactions.member_id')
            ->select('members.id', 'members.name', 'members.phone_number', 'transactions.member_id')
            ->get();

        // no5
        // no6
        $data6 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->get();

        // no7
        $data7 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('transactions.date_end', 'like', '06-2021%')
            ->get();

        // no8
        $data8 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('transactions.date_start', 'like', '05-2021%')
            ->get();

        // no9
        $data9 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('transactions.date_start', 'like', '06-2021%')
            ->where('transactions.date_end', 'like', '06-2021%')
            ->get();

        $data10 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.address', 'like', 'bandung%')
            ->get();

        $data11 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->where('members.address', 'like', 'bandung%')
            ->where('members.gender', 'like', 'p%')
            ->get();

        $data12 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->where('transaction_details.qty', '<>', 1)
            ->get();

        $data13 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'books.price', DB::raw('transaction_details.qty * books.price as total'))
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->get();

        $data14 = DB::table('members')
            ->select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'authors.name', 'publishers.name', 'catalogs.name')
            ->join('transactions', 'transactions.member_id', '=', 'members.id')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('books', 'transaction_details.book_id', '=', 'books.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
            ->get();

        $data15 = DB::table('catalogs')
            ->select('catalogs.id', 'catalogs.name', 'books.title')
            ->join('books', 'catalogs.id', '=', 'books.catalog_id')
            ->get();

        $data16 = DB::table('books')
            ->select('books.id', 'books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->where('books.publisher_id', '=', NULL)
            ->get();

        $data17 = DB::table('books')
            ->where('author_id', '=', 'PG05')
            ->get();

        $data18 = DB::table('books')
            ->where('price', '>', 10000)
            ->get();

        $data19 = DB::table('books')
            ->where('publisher_id', '=', 'Penerbit 01')
            ->where('qty', '>', 10)
            ->get();

        $data20 = DB::table('members')
            ->where('created_at', '=', '06-2021%')
            ->get();

        // return $data20;
        return view('home', [
            'judul' => 'Dasboard'
        ]);
    }
}
