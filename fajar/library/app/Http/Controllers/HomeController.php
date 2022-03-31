<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Book;
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
        // $data = Member::with('user')->get();

        //1
        $data = Member::select('*')
                ->join('users', 'users.member_id', '=', 'members.id')
                ->get();

        //2
        $data2 = Member::select('*')
                ->leftJoin('users', 'members.id', '=', 'users.member_id')
                ->where('users.id', null)
                ->get();

        $data3 = Transaction::select('members.id', 'members.name')
                ->rightJoin('members', 'members.id', '=', 'transactions.member_id')
                ->where('transactions.member_id', null)
                ->get();

        $data4 = Transaction::select('members.id', 'members.name', 
                'members.phone_number')
                ->join('members', 'members.id', '=', 'transactions.member_id')
                ->get();

                        //belom paham
        $data5 = Member::select('members.*', 
                'transactions.member_id')
                ->selectRaw('count(transactions.member_id) as total')
                ->join('transactions', 'members.id', '=', 'transactions.member_id')
                ->groupBy('transactions.member_id')
                ->having('transactions.member_id', '>', ' 1')
                ->get();

        $data6 = Member::select('members.name', 'members.address' ,'members.phone_number', 
                'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', '=', 'members.id')
                ->get();

        $data7 = Member::select('members.name', 'members.address' ,'members.phone_number', 
                'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id', '=', 'members.id')
                ->where('transactions.date_end' ,'month(date_end)=06')
                ->orderBy('members.name', 'asc')
                ->get();

        $data8 = Member::select('members.name', 'members.phone_number', 'members.address',
                'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->where('transactions.date_start', 'month(date_start)=05')
                ->orderBy('members.name',  'asc')
                ->get();

         $data9 = Member::select('members.name', 'members.phone_number', 'members.address',
                'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->where('transactions.date_start', 'month(date_start)=05')
                ->where('transactions.date_end', 'month(date_end)=05')
                ->orderBy('members.name', 'asc')
                ->get();

        $data10 = Member::select('members.name', 'members.phone_number', 'members.address',
                'transactions.date_start', 'transactions.date_end')
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->where('members.address', 'like', '%bandung%')
                ->orderBy('members.name', 'asc')
                ->get();

        $data11 = Transaction::select('members.name', 'members.phone_number', 
                'members.address', 'transactions.date_start', 'transactions.date_end')
                ->join('members', 'transactions.member_id' , '=' , 'members.id')
                ->where('members.address', 'like', '%vincenza%')
                ->where('members.gender', '=' ,'F' )
                ->orderBy('members.name', 'asc')
                ->get();

        $data12 = Member::select('members.name', 'members.phone_number',
                'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty')
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id' , '=' , 'transactions.id')
                ->where('transaction_details.qty', '>', 1)
                ->get();
                

                //data 13 error //data 13 error
                //data 13 error //data 13 error
                 
        $data13 = Member::select('members.name', 'members.phone_number', 
                'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.title', 'books.price',
                
                Member::raw('books.price * transaction_details.qty AS total'))
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id' , '=' , 'transactions.id')
                ->join('books', 'books.id', '=', 'transaction_details.book_id')
                ->orderBy('members.name', 'asc')
                ->get(); 
                
                
                //data 13 error //data 13 error
                //data 13 error //data 13 error


        $data14 = Member::select('members.name', 'members.phone_number',
                'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.title', 'publishers.name', 'authors.name','catalogs.name',)
                ->join('transactions', 'transactions.member_id' , '=' , 'members.id')
                ->join('transaction_details', 'transaction_details.transaction_id' , '=' , 'transactions.id')
                ->join('books', 'books.id', '=', 'transaction_details.book_id')
                ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                ->get();

        $data15 = Catalog::select('catalogs.*', 'books.title as book_title')
                ->join('books', 'books.catalog_id', '=', 'catalogs.id')
                ->get();

        $data16 = Book::select('books.*', 'publishers.name as publisher_name')
                ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->get();



        $data17 = Book::select('author_id',Book::raw('count(books.author_id) as total'))
                ->groupBy('author_id')
                ->where('author_id', '=', 7)
                ->get();

        $data18 = Book::select('*')
                ->where('price', '>', 10000)
                ->get();

        
        $data19 = Book::select('*')
                ->where('publisher_id', '=', 1)
                ->where('qty', '>', 10)
                ->get();

        $data20 = Member::select('*')
                ->whereMonth('created_at', '2')
                ->get();

        // return $data5;


        return view('home');
    }
}