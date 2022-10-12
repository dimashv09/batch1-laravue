<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

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
        //$catalog = Catalog::with('books')->get();
        //$transaction = Transaction::with('member')->get();
        //$transaction_detail = TransactionDetail::with('transaction')->get();
        //soal 1
        //$data = Member::select('*')
        //    ->where('name', 'like', 'users%')
        //    ->get();
        ////soal 2
        //$data1 = Member::select('member.id', 'member.name', 'member.phone_number', 'qty')
        //    ->Join('transaction', 'transaction.members_id', '=', 'members.member_id')
        //    ->Join('detail_transaction', 'detail_transction.transaction.id', '=', 'transaction.transaction_id')
        //    ->where('qty', '>', 1)
        //    ->get();

        //return $data1;
        //return $transaction_detail;
        //return $transaction;
        //return $catalog;
        //return $authors;
        //return $publishers;
        //return $books;
        //return $members;
        return view('home');
    }
}
