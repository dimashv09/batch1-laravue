<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('admin.transaction.transaction');
    }

    public function api()
    {
        $transactions = Transaction::with('member', 'transaction_detail.book')->get();

        $datatables = datatables()->of($transactions)
            ->addColumn('duration', function ($transaction) {
                $date_start = date_create($transaction->date_start);
                $date_end = date_create($transaction->date_end);
                $interval = date_diff($date_start, $date_end);
                return $interval->format('%a') . " Days";
            })
            ->addColumn('total', function ($transaction) {
                $total = $transaction->transactionDetail->sum('qty');
                return $total;
            })
            ->addColumn('purchase', function ($transaction) {
                $purchases = $transaction->transactionDetail->sum('book.price');
                return $purchases;
            })
            ->addColumn('status', function ($transaction) {
                $status = $transaction->status ? "Sudah dikembalikan" : "Belum dikembalikan";
                return $status;
            })
            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::all();

        return view('admin.transaction.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Transaction::create($request->all());

        return redirect('transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
