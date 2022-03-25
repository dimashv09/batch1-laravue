<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\TransactionDetail;
use App\Models\Book;
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
        $books = Book::all();
        return view('admin.transaction.index');
    }

    public function api(Request $request){

        if ($request->status){
            $datas = Transaction::select('transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->whereMonth('status','=', $request->status)
                                ->get();
        }else{
            $datas = Transaction::select('transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->get();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        return $datatables->make(true);
    }

    public function api2(Request $request){

         if ($request->date_filter){
            $datas = Transaction::select('transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->whereMonth('transactions.date_start', $request->date_filter)
                                ->get();
        }else{
            $datas = Transaction::select('transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->get();
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Transaction::select('*')
                            ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                            ->join('books','books.id','=','transaction_details.book_id')
                            ->where('books.qty','>=','1')
                            ->get();
        return view('admin.transaction.create', compact('books'));
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
