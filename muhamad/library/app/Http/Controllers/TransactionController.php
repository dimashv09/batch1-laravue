<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use DateTime;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        $books = Book::all();
        return view('admin.transaction', compact('members', 'books'));
    }

    public function api()
    {
        $transactions = Transaction::selectRaw('date_start, date_end, name, DATEDIFF(date_end, date_start) as day_left, COUNT(transaction_details.id) as total_books, SUM(price) as total_price, status')
            ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('books', 'books.id', '=', 'transaction_details.book_id')
            ->join('members', 'members.id', '=', 'transactions.member_id')
            ->groupBy('name')
            ->get();

        $datatables = datatables()
            ->of($transactions)
            ->addColumn('date_left', function ($transaction) {
                return getRemainingDays($transaction->date_start, $transaction->date_end);
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
        // Validation data
        $validator = $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required'
        ]);

        // Insert validated data into database
        Transaction::create($validator);

        return redirect('transactions')->with('success', 'New transaction data has been Added');
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
        //
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
        //Validation data
        $validator = $request->validate([
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required'
        ]);

        // Insert validated data into database
        $transaction->update($validator);

        return redirect('transactions')->with('success', 'Transaction data has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        // Delete data with specific ID
        $transaction->delete();

        return redirect('transactions')->with('success', 'Transaction data has been Deleted');
    }
}
