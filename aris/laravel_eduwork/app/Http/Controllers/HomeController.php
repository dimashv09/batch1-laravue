<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
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
        //no 1
        $data = Member::select('*')->join('users','users.member_id','=','members.id')->get();

        //no 2
        $data2 = Member::select('*')->join('users', 'users.member_id','!=','users.id')->get();

        //no 3
        $data3 = Member::select('members.id','members.name')->leftjoin('transactions', 'transactions.member_id','=','members.id')->where('transactions.id','=',NULL)->get();

        //no 4
        $data4 = Member::select('members.id','members.name','members.phone_number')->join('transactions','transactions.member_id','=','members.id')->get();

        //no 5
        $data5 = Member::select('members.id','members.name','members.phone_number')->join('transactions','transactions.member_id','=','members.id')->count('transactions.member_id','>','1');

        //no 6
        $data6 = Member::select('members.id','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->get();

        //no 7
        $data7 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->whereMonth('transactions.date_start','=','6')->get();

        //no 8
        $data8 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->whereMonth('transactions.date_start','=','5')->get();

        //no 9
        $data9 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->whereMonth('transactions.date_start','=','6')->whereMonth('transactions.date_end','=','6')->get();

        //no 10
        $data10 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->where('members.address','like','%bandung%')->get();

        //no 11
        $data11 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end')->join('transactions','transactions.member_id','=','members.id')->where('members.address','like','%bandung%','and','members.gender','=','1')->get();

        //no 12
        $data12 = Member::select('members.name','mrs.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty')->join('transactions','transactions.member_id','=','members.id')->join('transaction_details','transaction_details.transaction_id','=','transactions.id')->join('books','books.id','=','transaction_details.book_id')->groupBy('transaction_details.qty')->count('transaction_details.qty','>','1');

        //no 13
        $data13 = DB::table('members')
        ->select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.id','transaction_details.qty','books.title',DB::raw('books.price * transaction_details.qty as total'))
        ->join('transactions','transactions.member_id','=','members.id')
        ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
        ->join('books','books.isbn','=','transaction_details.book_id')->get();

        $data14 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','transaction_details.qty','books.title','publishers.name','authors.name','catalogs.name')->join('transactions','transactions.member_id','=','members.id')->join('transaction_details','transaction_details.transaction_id','=','transactions.id')->join('books','books.id','=','transaction_details.book_id')->join('publishers','publishers.id','books.publisher_id')->join('authors','authors.id','=','books.author_id')->join('catalogs','catalogs.id','=','books.catalog_id')->get();

        //no 15
        $data15 = Catalog::select('catalogs.id','catalogs.name','books.title')->join('books','books.catalog_id','=','catalogs.id')->get();

        //no 16
        $data16 = Book::select('books.isbn','books.title','books.year','books.author_id','books.publisher_id','books.qty','books.price','publishers.name')->leftjoin('publishers','publishers.id','=','books.publisher_id')->get();

        //no 17
        // $data17 = Book::select(count('books.publisher_id'),'as','jumlah publisher'))->where('publishers.publisher_id','=','pg05')->get();

        $data17 = DB::table('books')->select(DB::raw('COUNT(publisher_id) as jumlah_publisher'))->join('publishers','publishers.id','=','books.publisher_id')->where('publisher_id','=','6')->get();

        //no 18
        $data18 = Book::select('*')->where('books.price','>','10000')->get();

        //no 19
        $data19 = Book::select('*')->where('publisher_id','like','%01%','and','qty','>','10')->get();

        //no 20
        $data20 = Book::select('*')->whereMonth('created_at','=','6')->get();
        
        //no 3
        $data = Member::select('*')->leftjoin('users','users.member_id','=','members.id')->where('users.id','=',NULL)->get();

        //no 4
        $data = Transaction::select('members.id','members.name')->rightJoin('members','members.id','=','transactions.member_id')->where('transactions.member_id','=',NULL)->get();

        // no 5
        $data = Member::select('members.id', 'members.name','members.phone_number')->join('transactions','transactions.member_id','=','members.id')->orderBy('members.id','asc')->get();

        // return $data;
        // return $data2;
        // return $data13;
        return view('home');

    }
}
