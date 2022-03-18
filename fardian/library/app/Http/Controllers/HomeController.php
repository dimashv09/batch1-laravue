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

    // public function home(){
    //     $total_member = Member::count();
    //     $total_book = Book::count();
    //     $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
    //     $total_publisher = Publisher::count();

    //     $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id','asc')->pluck('qty');
    //     $label_donut = Publisher::orderBy('publishers.id','asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');

    //     $label_bar = ['Transaction'];
    //     $data_bar = [];

    //     foreach ($label_bar as $key => $value) {
    //         $data_bar[$key]['label'] = $label_bar[$key];
    //         $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0.9)';
    //         $data_month = [];

    //         foreach (range(1,12) as $month) {
    //             $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('start_date', $month)->first()->total;
    //         }

    //         $data_bar[$key]['data'] = $data_month;
    //     }

    //     return view('admin.home', compact('total_member','total_book','total_transaction','total_publisher'));
    // }
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
        $total_member = Member::count();
        $total_book = Book::count();
        $total_transaction = Transaction::whereMonth('date_start', date('m'))->count();
        $total_publisher = Publisher::count();

        // $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))->groupBy('publisher_id')->orderBy('publisher_id','asc')->pluck('qty');
        // $label_donut = Publisher::orderBy('publishers.id','asc')->join('books', 'books.publisher_id', '=', 'publishers.id')->groupBy('name')->pluck('name');

        // $label_bar = ['Transaction'];
        // $data_bar = [];

        // foreach ($label_bar as $key => $value) {
        //     $data_bar[$key]['label'] = $label_bar[$key];
        //     $data_bar[$key]['backgroundColor'] = 'rgba(60,141,188,0.9)';
        //     $data_month = [];

        //     foreach (range(1,12) as $month) {
        //         $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('start_date', $month)->first()->total;
        //     }

        //     $data_bar[$key]['data'] = $data_month;
        // }

        return view('home', compact('total_member','total_book','total_transaction','total_publisher'));
    }
}
