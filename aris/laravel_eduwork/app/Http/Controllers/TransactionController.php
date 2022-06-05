<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::all();
        $books = Book::all();
        $transactions = Transaction::with('member','details.book')
        ->get();
        $transactiondetail = TransactionDetail::with('book')->get();
        // $transactions = Transaction::with('member')->get();
        // $data = Transaction::select('transactions.date_start','transactions.date_end','members.name','books.title')
        // ->join('members','members.id','=','transactions.member_id')
        // ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
        // ->join('books','books.id','=','transaction_details.book_id')->get();
        // // return $data;


        //   // return $transactions;
        // return $transactiondetail;
        return view('transaction.index', compact('transactions','members','books','transactiondetail'));
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
      
        
        $this->validate($request,[
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status'=>'required',
            'book_id' => 'required',


        ]);
           // $transaction->member_id = $request->member_id;
           // $transaction->date_start = $request->date_start;
           // $transaction->date_end = $request->date_end;
           // $transaction->status = $request->status;
           // $transaction->book_id = $request->book_id;
           // return $transaction;

        $transaction = Transaction::create([
           'member_id' => $request->member_id,
           'date_start' => $request->date_start,
           'date_end' => $request->date_end,
           'status' => $request->status,
           'book_id' => $request->book_id,

        ]);
        // $transaction->save();

       
        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'book_id' => $request->book_id,
           
        ]);

        $transaction->save();

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
