<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Member;
use App\Models\Catalog;
use App\Models\Publisher;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_members      = Member::count();
        $total_books        = Book::count();
        $total_transactions = Transaction::count();
        $total_publishers   = Publisher::count();

        // Donut chart
        $data_donut = Book::select(DB::raw("COUNT(publisher_id) as total"))
                            ->groupBy('publisher_id')
                            ->orderBy('publisher_id', 'asc')
                            ->pluck('total');
        $label_donut = Publisher::orderBy('publishers.id', 'asc')
                            ->join('books', 'books.publisher_id', '=', 'publishers.id')
                            ->groupBy('publishers.name')
                            ->pluck('publishers.name');
        // Pie chart
        $data_pie = Book::select(DB::raw("COUNT(catalog_id) as total"))
                            ->groupBy('catalog_id')
                            ->orderBy('catalog_id', 'asc')
                            ->pluck('total');
        $label_pie = Catalog::orderBy('catalogs.id', 'asc')
                            ->join('books', 'books.catalog_id', '=', 'catalogs.id')
                            ->groupBy('catalogs.name')
                            ->pluck('catalogs.name');
        // Bar chart
        $label_bar = ['Borrow', 'Return'];
        $data_bar = [];

        foreach ($label_bar as $key => $value){
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach(range(1,12) as $month){
                if($key == 0){
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_start', $month)->first()->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('date_end', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }

        return view('home', compact('total_books', 'total_members', 'total_publishers', 'total_transactions', 'data_donut', 'label_donut', 'data_bar', 'data_pie', 'label_pie'));
    }
}
