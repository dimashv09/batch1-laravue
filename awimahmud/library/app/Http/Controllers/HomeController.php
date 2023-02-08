<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
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
        //$publishers = Publisher::with('books')->get();
        // $authors = Author::with('books')->get();
        //$books = Book::with('author')->get();
        // $catalogs = Catalog::with('books')->get();
        // $books = Book::with('catalog')->get();
        // $transactions = Transaction::with('member')->get();
        // $members = Member::with('transactions')->get();
        
        //no 1
        $Data1 = Member::select('*')
                        ->join('users','users.member_id','=','members.id')
                        ->get();
        // no 2
        $Data2 = Member::select('*')
                        ->leftJoin('users','users.member_id', '=', 'members.id')
                        ->where('users.id', NULL)
                        ->get();
        //no 3
        $Data3 = Transaction::select('members.id', 'members.name')
                        ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                        ->where('transactions.member_id', null)
                        ->get();

        
        //no 4
        $Data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                        ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->orderBy('members.id', 'asc')
                        ->get();

        //no 5
        $Data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                        ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transaction_details.transaction_id')
                        ->where('transaction_details.qty', '>', 1)
                        ->get();

        //no 6
        $Data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->Join('transactions', 'transactions.member_id','=', 'members.id')
                        ->get();

        //no 7
        $Data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->Join('transactions', 'transactions.member_id','=', 'members.id')
                        ->whereRaw('month(transactions.data_end)= 6')
                        ->get();
       
        //no 8
        $Data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->Join('transactions', 'transactions.member_id','=', 'members.id')
                        ->whereRaw('month(transactions.date_start)= 5')
                        ->get();

        //no 9
        $Data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->Join('transactions', 'transactions.member_id','=', 'members.id')
                        ->whereRaw('month(transactions.date_start)= 6')
                        ->whereRaw('month(transactions.data_end)= 6')
                        ->get();

        //no 10
        $Data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->RightJoin('transactions', 'transactions.member_id', '=', 'members.id')
                        ->Where('members.address', 'like', '%bandung%')
                        ->get();
       
        //no 11
        $Data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end')
                        ->RightJoin('transactions', 'transactions.member_id', '=', 'members.id')
                        ->Where('members.address','like','%bandung%','and','members.gender','=','P')
                        ->get();
      
        //no 12
        $Data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end','transaction_details.book_id','transaction_details.qty')
                        ->RightJoin('transactions', 'transactions.member_id', '=', 'members.id')
                        ->RightJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->Where('transaction_details.qty','=',1)
                        ->get();
       
        //no 13
        $Data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end','transaction_details.book_id','transaction_details.qty','books.title','books.price')
                        ->selectRaw('sum(transaction_details.qty*books.price) as Total_Price')
                        ->distinct()
                        ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->Join('books', 'books.id', '=', 'transaction_details.book_id')
                        ->groupBy('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end','transaction_details.book_id','transaction_details.qty','books.title','books.price')
                        ->get();

        //no 14
        $Data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.data_end','transaction_details.book_id','transaction_details.qty','books.title','publishers.name','authors.name','catalogs.name')
                        ->Join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->Join('books', 'books.id', '=', 'transaction_details.book_id')
                        ->Join('publishers','publishers.id', '=', 'books.publisher_id')
                        ->Join('authors', 'authors.id', '=', 'books.author_id')
                        ->Join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                        ->get();


        // no 15
        $Data15 = Catalog::select('catalogs.*', 'books.title')
                        ->Join('books', 'books.catalog_id', '=', 'catalogs.id')
                        ->get();

        //no 16
        $Data16 = Book::select('books.*', 'publishers.name')
                        ->leftJoin('publishers', 'publishers.id', '=', 'books.publisher_id')
                        ->get();

        //no 17
        $Data17 = Book::where('author_id', 'like', 'PG05')
                        ->count('author_id');
        
        //no 19
        $Data18 = Book::select('*')
                        ->Join('transaction_details','transaction_details.book_id', '=','books.id')
                        ->Join('transactions','transactions.id','=','transaction_details.transaction_id')
                        ->where('transactions.date_start', '>', 10000)
                        ->get();

        
        $Data19 = Book::select('*')
                        ->Join('publishers', 'publishers.id','=','books.publisher_id')
                        ->Where('publishers.name','=','Alivia','and','books.qty','>',10)
                        ->get();

        //no 20
        $Data20 = Member::select('*')
                        ->whereRaw('month(members.created_at)=6')
                        ->get();

        // return $Data20;
        return view('home');
    }
}
