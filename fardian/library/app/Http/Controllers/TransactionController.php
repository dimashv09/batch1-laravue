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
       
        return view('admin.transaction.index');
    }

    public function api(Request $request){

        if ($request->status_filter == null){
            $datas = Transaction::select('transactions.id','transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->get();
        }else{
            $datas = Transaction::select('transactions.id','transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->where('transactions.status','=', $request->status_filter)
                                ->get();
        }

        $datatables = datatables()->of($datas)->
                                    addColumn('action', function($datas){
                                    return '
                                    <a href="#" class="btn btn-info btn-sm">
                                    Detail
                                    </a>
                                    <a href="transaction/'.$datas->id.'/edit" class="btn btn-warning btn-sm">
                                    Edit
                                    </a>
                                    <a href="transaction/delete'.$datas->id.'" class="btn btn-danger btn-sm"s>
                                    Delete
                                    </a>
                                    ';
                                    })->addIndexColumn();

        return $datatables->make(true);
    }

    public function api2(Request $request){

         if ($request->date_filter){
            $datas = Transaction::select('transactions.id','transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->whereMonth('transactions.date_start', $request->date_filter)
                                ->get();
        }else{
            $datas = Transaction::select('transactions.id','transactions.date_start','transactions.date_end','members.name','transaction_details.qty',Transaction::raw('(transaction_details.qty * books.price) as total_price'),Transaction::raw('(transactions.date_end - transactions.date_start) as long_borrow'),Transaction::raw("(CASE WHEN transactions.status ='1' THEN 'Has Been Returned' WHEN transactions.status = '0' THEN 'Not Been Restored' ELSE '-' END) as status_borrow"))
                                ->join('members','members.id','=','transactions.member_id')
                                ->join('transaction_details','transaction_details.transaction_id','=','transactions.id')
                                ->join('books','books.id','=','transaction_details.book_id')
                                ->get();
        }

        $datatables = datatables()->of($datas)->
                                    addColumn('action', function($datas){
                                    return '
                                    <a href="#" class="btn btn-info btn-sm">
                                    Detail
                                    </a>
                                    <a href="transaction/edit'.$datas->id.'" class="btn btn-warning btn-sm">
                                    Edit
                                    </a>
                                    <a href="transaction/delete'.$datas->id.'" class="btn btn-danger btn-sm"s>
                                    Delete
                                    </a>
                                    ';
                                    })->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::select('*')
                            ->where('books.qty','>=','1')
                            ->get();
        $members = Member::select('*')
                            ->get();
        return view('admin.transaction.create', compact('books','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => 0
        ]);

        if($transaction){
            foreach ($request->book_id as $id)
            {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id' => $id,
                    'qty' => 1
                ]);

                Book::where('id', $id)->decrement('qty');
            }
        }
        return redirect('transaction');
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
        $books = Book::select('*')
                            ->where('books.qty','>=','1')
                            ->get();
        $members = Member::select('*')
                            ->get();
        $transactionDetails = TransactionDetail::where('transaction_id',$transaction->member_id)
                                                ->get();
        return view('admin.transaction.edit', compact('books','members','transaction','transactionDetails')); 
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
        $transaction->update([
            'member_id' => $request->member_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'status' => $request->status
        ]);

        if($transaction){
            foreach ($request->book_id as $id)
            {
                TransactionDetail::update([
                    'transaction_id' => $transaction->id,
                    'book_id' => $id
                ]);

                Book::where('id', $id)->increment('qty');
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
        //
    }
}
