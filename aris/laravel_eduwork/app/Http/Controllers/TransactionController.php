<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
use Carbon\Carbon;
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
        $books = Book::where('qty','>','0')->get();
       
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
    public function date(Request $request)
    {
        //
        if ($request->date_start) {
            $transactions = Transaction::where('date_start', $request->date_start)->get();
        }else {
            $transactions = Transaction::with('member','details.book');
        }


        // $transactions = Transaction::all();
        $datatables = datatables()->of($transactions)
        ->addColumn('duration', function($transaction){
            return  $date = Carbon::parse($transaction->date_start)->floatDiffInDays($transaction->date_end). " day";

        })
        ->addColumn('purches', function($transaction) {
            $purches = $transaction->transactiondetails->sum('book.price');
            return "Rp." . number_format($purches);
        })
        ->addColumn('name', function($transaction) {
            $name = $transaction->member->name;
            return $name;
        })
        ->addColumn('qty', function($transaction) {
            $datas = $transaction->transactiondetails->sum('qty');
            // $data = $transaction->qty;
            return $datas;
        })
        ->addIndexColumn();

        return $datatables->make(true);

    }

    public function api(Request $request)
    {
        if ($request->status) {
            $transactions = Transaction::where('status', $request->status)->get();
        }else {
            $transactions = Transaction::with('member','details.book');
        }


        // $transactions = Transaction::all();

        $datatables = datatables()->of($transactions)
        ->addColumn('duration', function($transaction){
            return  $date = Carbon::parse($transaction->date_start)->floatDiffInDays($transaction->date_end). " day";

        })
        ->addColumn('purches', function($transaction) {
            $purches = $transaction->transactiondetails->sum('book.price');
            return "Rp." . number_format($purches);
        })
        ->addColumn('name', function($transaction) {
            $name = $transaction->member->name;
            return $name;
        })
        ->addColumn('qty', function($transaction) {
            $datas = Transaction::with('details.book');
            $data = $transaction->transactiondetails->sum('qty');
            return $data;
        })
        ->addIndexColumn();

        return $datatables->make(true);
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
            'status'=>'belum',
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
           'status' => 'belum',

        ]);
        // $transaction->save();

       foreach($request->book_id as $book){
        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'qty'=> 1,
            'book_id' => $book,
           
        ]);

            $books = Book::find($book);
            $books->qty -= 1;

            $books->save();
    }


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
       
        $books = Book::where('qty', '>=', 1)->get();
        $transactiondetail = TransactionDetail::where('transaction_id', $transaction->id)->get();

        return view('transaction.detail', compact('transaction','books','transactiondetail'));
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
        $members = Member::all();
        $books = Book::where('qty', '>=', 1)->get();
        $transactiondetail = TransactionDetail::where('transaction_id', $transaction->id)->get();
        // dd($transaction);
        return view('transaction.edit', compact('transaction','members','books','transactiondetail'));
        
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

        $transactions = Transaction::find($transaction->id)->update([
           'member_id' => $request->member_id,
           'date_start' => $request->date_start,
           'date_end' => $request->date_end,
           'status' => $request->status,

        ]);
        // $transaction->save();
        if ($transactions) {
            TransactionDetail::where('transaction_id',$transaction->id)->delete();
       foreach($request->book_id as $book){
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'qty'=> '1',
                    'book_id' => $book,
                   
                ]);

                $books = Book::find($book);
                if ($request->status == 'sudah') {
                $books->qty += 1;
                }
                $books->save();
            }
        }

        return redirect('transactions');
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
        $data = TransactionDetail::where('transaction_id', $transaction->id);
        $delete = Transaction::find($transaction->id);
        if ($data->delete()) {
           $delete->delete();
        }

        return redirect('transactions');
    }
}
