<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Data of Box
        $books = Book::count();
        $publishers = Publisher::count();
        $members = Member::count();
        $transactions = Transaction::whereMonth('date_start', date('m'))->count();

        // Data of Donut Chart
        $data_donut = Book::select(DB::raw('COUNT(publisher_id) as total'))
            ->groupBy('publisher_id')
            ->orderBy('publisher_id', 'ASC')
            ->pluck('total');
        $label_donut = Publisher::orderBy('publisher_id', 'ASC')
            ->join('books', 'books.publisher_id', '=', 'publishers.id')
            ->groupBy('name')
            ->pluck('name');

        // Data of Pie Chart
        $data_pie = Book::select(DB::raw('COUNT(author_id) as total'))
            ->groupBy('author_id')
            ->orderBy('author_id', 'ASC')
            ->pluck('total');
        $label_pie = Author::orderBy('author_id', 'ASC')
            ->join('books', 'books.author_id', '=', 'authors.id')
            ->groupBy('name')
            ->pluck('name');

        // Data of Bar Chart
        $label_bar = ['Transaction Starts', 'Transaction Ends'];
        $data_bar = [];
        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1)';

            $data_month = [];
            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Transaction::select(DB::raw('COUNT(*) as total'))
                        ->whereMonth('date_start', $month)
                        ->first()
                        ->total;
                } else {
                    $data_month[] = Transaction::select(DB::raw('COUNT(*) as total'))
                        ->whereMonth('date_end', $month)
                        ->first()
                        ->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('admin.dashboard', compact('books', 'publishers', 'members', 'transactions', 'data_donut', 'label_donut', 'data_pie', 'label_pie', 'data_bar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
