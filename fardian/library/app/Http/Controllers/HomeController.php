<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Author;
use App\Models\Catalog;
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
        // // no 1
        // $data = Member::select('*')
        //                 ->join('users','users.member_id','=','members.id')
        //                 ->get();

        // //return $data;

        // // no 2
        // $data2 = Member::select('*')
        //                 ->leftJoin('users','users.member_id','=','members.id')
        //                 ->where('users.id',NULL)
        //                 ->get();

        // //return $data2;

        // // no 3
        // $data3 = Transaction::select('members.id','members.name')
        //                 ->rightJoin('members','members.id','=','transactions.member_id')
        //                 ->where('transactions.member_id',NULL)
        //                 ->get();

        // //return $data3;

        // // no 4
        // $data4 = Member::select('members.id','members.name','members.phone_number')
        //                 ->join('transactions','transactions.member_id','=','members.id')
        //                 ->orderBy('members.id','asc')
        //                 ->get();

        // //return $data4;

        // //no 5
        // $data5 = Member::select('members.id','members.name','members.phone_number')
        //                 ->rightJoin('transactions','transactions.member_id','=','members.id')
        //                 ->groupBy('members.id','members.name','members.phone_number')
        //                 ->havingRaw('COUNT(*) > 1')
        //                 ->get();

        // //return $data5;

        // //no 6
        // $data6 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->leftJoin('transactions','transactions.member_id','=','members.id')
        //                 ->get();

        // //return $data6;

        // //no7
        // $from = date('2021-06-01');
        // $to = date('2021-06-30');
        // $data7 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->leftJoin('transactions','transactions.member_id','=','members.id')
        //                 ->whereBetween('transactions.date_end', [$from, $to])
        //                 ->get();

        // //return $data7;

        // //no8
        // $from2 = date('2021-05-01');
        // $to2 = date('2021-05-31');
        // $data8 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->leftJoin('transactions','transactions.member_id','=','members.id')
        //                 ->whereBetween('transactions.date_start', [$from2, $to2])
        //                 ->get();

        // //return $data8;

        // //no9
        // $data9 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->leftJoin('transactions','transactions.member_id','=','members.id')
        //                 ->whereBetween('transactions.date_start', [$from, $to])
        //                 ->whereBetween('transactions.date_end',[$from, $to])
        //                 ->get();

        // //return $data9;

        // //no10
        // $data10 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->rightJoin('transactions','transactions.member_id','=','members.id')
        //                 ->where('members.address', 'like', '$Bandung')
        //                 ->get();
                        
        // //return $data10;

        // //no11
        // $data11 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')
        //                 ->rightJoin('transactions','transactions.member_id','=','members.id')
        //                 ->where('members.address', 'like', '$Bandung')
        //                 ->Where('members.gender', 'like', 'F')
        //                 ->get();
                        
        // //return $data11;

        // //no12
        // $data12 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.book_id','transaction_details.qty')
        //                 ->join('transactions','transactions.member_id','=','members.id')
        //                 ->join('transaction_details','transactions.id','=','transaction_details.transaction_id')
        //                 ->where('transaction_details.qty','>',1)
        //                 ->get();
                        
        // //return $data12;

        // //no13
        // $data13 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.book_id','transaction_details.qty', 'books.title', 'books.price', Member::raw('books.price * transaction_details.qty as total'))
        //                 ->leftJoin('transactions','transactions.member_id','=','members.id')
        //                 ->rightJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        //                 ->rightJoin('books','transaction_details.book_id','=','books.id')
        //                 ->get();
        
        // //return $data13;

        // //no14
        // $data14 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.book_id','transaction_details.qty', 'books.title', 'publishers.name','authors.name','catalogs.name')
        //                 ->rightJoin('transactions','transactions.member_id','=','members.id')
        //                 ->rightJoin('transaction_details','transactions.id','=','transaction_details.transaction_id')
        //                 ->rightJoin('books','transaction_details.book_id','=','books.id')
        //                 ->leftJoin('publishers','books.publisher_id','=','publishers.id')
        //                 ->leftJoin('authors','books.author_id','=','authors.id')
        //                 ->leftJoin('catalogs','books.catalog_id','=','catalogs.id')
        //                 ->get();
        
        // //return $data14;

        // //no15
        // $data15 = Catalog::select('catalogs.*','books.title')
        //                 ->join('books','books.catalog_id','=','catalogs.id')
        //                 ->get();

        // //return $data15;

        // //no16
        // $data16 = Book::select('books.*','publishers.name')
        //              ->join('publishers','books.publisher_id','=','publishers.id')
        //              ->get();
        
        // //return $data16;

        // //no17
        // $data17 = Book::select(Book::raw('count(books.author_id) as count_authors'))
        //               ->where('books.author_id','=','PG05')
        //               ->get();

        // //return $data17;

        // //no18
        // $data18 = Book::select('*')
        //               ->where('price','>','10000')
        //               ->get();
        
        // //return $data18;

        // //no19
        // $data19 = Book::select('*')
        //               ->join('publishers','books.publisher_id','=','publishers.id')
        //               ->where('publishers.name','=','')
        //               ->get();
        
        // //return $data19;

        // //no20
        // $data20 = Member::select('*')
        //               ->where('members.created_at','>','2022-02-09')
        //               ->get();

        // return $data20;

        // $members = Member::with('user')->get();
        // $books = Book::with('publisher')->get();
        // $publishers = Publisher::with('books')->get();
        // $catalogs = Catalog::with('books')->get();
        // $authors = Author::with('books')->get();
        // $transactions = Transaction::all();

        //return $transactions;
        //return $authors;
        //return $catalogs;
        //return $publishers;
        //return $books; 
        return view('home');
    }
}
