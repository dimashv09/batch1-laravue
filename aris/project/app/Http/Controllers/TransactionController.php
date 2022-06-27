<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = Order::all();
        $count = Transaction::sum('price');
        $transactions = Transaction::all();
        $transaction = Transaction::first();
        $datas = $request->harga;
        $data = '';
        $data = $datas;

        $total = $data -= $count;
        return view('product.order', compact('orders','transactions','count','transaction','total','datas'));
    }


    public function updateharga(Request $request)
    {
        $transaction = Transaction::sum('price');

        $data = $request->harga;

        $total = $data -= $transaction;
       
        return view('product.order', compact('total'));
    }

     public function apiorder(Request $request)
    {
        $orders = Order::all();
        $datatables = datatables()->of($orders)->addIndexColumn();

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
        $transactions = Transaction::with('order')->get();
        return view('product.order', compact('transactions'));
    }

     public function pdf(Request $request)
    {


        if (auth()->user()) {
            $transactions = Transaction::all();
            $date = date('d M Y');
            foreach($transactions as $transaction){
                $transaction->name;
            }
            $count = Transaction::sum('price');
            $datas = $request->harga;
            $data = '';
            $data = $datas;
            $total = $data -= $count;
            
            $pdf = PDF::loadView('product.invoice',compact('transactions','count','total','datas','transaction','date'))->setPaper('A4','potrait');
            return $pdf->download('invoice.pdf');
        }else{
            
            return redirect('/login');
        }
    }

    public function report(Request $request)
    {
        $orders = Order::onlyTrashed()->get();
        
        $count = Order::onlyTrashed()
        ->whereDate('deleted_at','Y-m-d');
        $total_order = Order::onlyTrashed()
        ->select(DB::raw("COUNT(*) as total"))
        ->GroupBy(DB::raw("Day(deleted_at)"))
        
        ->pluck('total');

        $day = Order::onlyTrashed()
        ->select(DB::raw("DAYNAME(deleted_at) as day "))
        ->GroupBy(DB::raw("DAYNAME(deleted_at)"))
        ->pluck('day');
        return view('product.report', compact('orders','count', 'total_order', 'day'));
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
    public function update(Request $request, Transaction $transaction, $id)
    {
         
            $order = Order::find($id);
            $transaction = new Transaction();
            $transaction->name = $order->name;
            $transaction->product_name = $order->product_name;
            $transaction->price = $order->price;
            $transaction->quantity = $order->quantity;
            $transaction->user_id = $order->user_id;
            $transaction->save();

            $order->delete();
            return redirect()->back();


           
       
    }


    public function data(Request $request,$id)
    {
        $data = Order::find($request->user_id);
        dd($data);
    }

    public function deletetransaction(Request $request)
    {
        $transactions = Transaction::all();
            foreach($transactions as $transaction){
        $transaction->delete();
        
    }
   
   
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction,$id)
    {
        //
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect()->back();
    }
}
