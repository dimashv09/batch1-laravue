<?php

namespace App\Http\Controllers;

use DateTime;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Member;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {   
        if (auth()->user()->hasRole('admin')) {
            return view('admin.transaction.index');
        } else {
            return redirect('home');
        }
        
        return view('admin.transaction.index');
    }

    public function api(Request $request)
    {
        
        $transactions = Transaction::with(['member', 'details'])->get();
        $details = TransactionDetail::all();
        $members = Member::all();

        if($request->filter){
            $transactions = Transaction::with(['member', 'details'])->whereDate('date_start', $request->filter)->get();
        }
        
        if($request->status){
            $transactions = Transaction::with(['member', 'details'])->where('status', $request->status == 2 ? 0 : 1)->get();
        }

        $datatables = datatables()->of($transactions)
                        ->addColumn('limit'/* lama pinjam  */, function( $transactions){
                                $tgl1 = new DateTime($transactions->date_start);
                                $tgl2 = new DateTime($transactions->date_end);
                                $jarak = $tgl2->diff($tgl1);
                                return $limit = $jarak->days;
                            }
                                                        
                        )->addColumn('purches', function ($transaction) {
                            $purcheses = $transaction->details->sum('book.price');
                            return "Rp. " . number_format($purcheses);
                            
                        })->editColumn('status', function ($transactions) {
                            if ($transactions->status == 0) return 'Belum Di Kembalikan';
                            if ($transactions->status == 1) return 'Sudah Di Kembalikan';
                            
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
        $books = Book::where('qty', '>', 0)->get();
        return view('admin.transaction.create' , compact('members','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => ''
        ]);
        
        $transactions = Transaction::create($request->all());
        
        if($transactions){
            foreach ($request->book as $key=>$item) {
                TransactionDetail::create([
                    'transaction_id' => $transactions->id,
                    'book_id' => $item,
                    'qty' => 1                    
                ]);
            }
            $books = Book::find($item);
            $books->qty -= 1;
            $books->save();
        }

        return redirect('transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $transactions = Transaction::with(['details','member'])->findOrFail($id);


        return view('admin.transaction.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $members = Member::all();
        
        $books = Book::where('qty', '>', 0)->get();

        $details = TransactionDetail::where('transaction_id', $transaction->id)->get();
        
        return view('admin.transaction.edit' , compact('details','transaction','members','books'));
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
        $this->validate($request,[
            'member_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => ''
        ]);

        $transactions = Transaction::find($transaction->id)
        ->update([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status,
        ]);
        

        if($transactions){
            TransactionDetail::where('transaction_id', $transaction->id)->delete();
            foreach ($request->book as $key=>$item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id' => $item,
                    'qty' => 1                    
                ]);
                $books = Book::find($item);
                if($request->status == 1){
                    $books->qty += 1;
                    $books->update();
                }
            }
    }
        return redirect('transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {   
        $transaction->details()->delete();
        $transaction->delete();
    }
}