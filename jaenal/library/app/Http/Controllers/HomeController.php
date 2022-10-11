<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;

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
        //$Members = Member :: All();
        //$Members = Member :: with ('user')->get();
        //$Books = Book::with ('Publisher')->get();
        //$Publishers = Publisher :: with ('Books')->get();
        //$Books = Book :: with ('Author')->get();
        //$Authors = Author :: with ('Books')->get();
        //$Books = Book :: with ('Catalog')->get();
        //$Catalogs = Catalog :: with ('Books')->get();
        //$Transactions = Transaction :: with ('member')->get();
        //$Members = Member :: with ('transaction')->get();

        //query buildder
        
        //data1
        $data = Member::select('*')
                    ->join('users', 'users.member_id','=','members.id')
                    ->get();
        
        //data2
        $data2 = Member::select('*')
                        ->leftJoin('users', 'users.member_id', '=', 'member_id')
                        ->where('users.id', null)
                        ->get();
        
        //data3
        $data3 = Transaction::select('members.id', 'members.name')
                            ->rightJoin('members', 'members.id', '=', 'transactions.member_id', null)
                            ->get();
        
        //data4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                         ->orderBy('members.id', 'asc')
                         ->get();

        //data5
        /*$data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                         ->join('transactions', 'transactions.member_id', '=', 'members.id')
                         ->groupBy('transactions.id')
                         ->having('count(transactions.id)', '>', 1)
                         ->get();*/
        //data6
        $data6 = Transaction::select('members.name', 'members.phone_number','members.address','members.created_at','members.updated_at')
                            ->join('members', 'transactions.member_id','=','members.id')
                            ->get();

        //data7
        $data7 = member::select('members.name', 'members.phone_number','members.address','members.created_at','members.updated_at')
                        ->join('transactions', 'transactions.member_id','=','members.id')
                        ->where('transactions.date_start', 'like', '05-1990%')
                        ->get();

        return $data7; 
        return view('home');
    }
}
