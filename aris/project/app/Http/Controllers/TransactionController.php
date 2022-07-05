<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Report;
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
        $orders = Order::select('name','phone','address','user_id')->GroupBy('name','phone','address','user_id')->get();

        $transactions = Transaction::all();
        $transaction = Transaction::first();
        $datas = $request->harga;
        $data = '';
        $data = $datas;

        return view('product.order', compact('orders','transactions','transaction','datas'));
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
            $date = date('d M Y');
            $transactions = Transaction::with('orders')
            ->where('user_id',$request->user_id)->get();
             $count = Order::where('user_id',$request->user_id)->sum('price');
             $totals = Order::select('total')
             ->where('user_id',$request->user_id)
             ->GroupBy('total')->get();

             foreach($transactions as $transaction){
                $transaction->orders->name;
                $transaction->orders->phone;
             }
            
            $data = $totals[0]['total'];
            $counts = $data - $count;
            
            $pdf = PDF::loadView('product.invoice',compact('transactions','counts','totals','data','count','transaction','date'))->setPaper('A4','potrait');
            return $pdf->download('invoice.pdf');
        }else{
            
            return redirect('/login');
        }
    }

    public function report(Request $request)
    {
        $orders = report::all();
        $total_order = report::select(DB::raw("COUNT(*) as total"))
        ->GroupBy(DB::raw("Day(created_at)"))
        ->pluck('total');
        $day = report::select(DB::raw("DAYNAME(created_at) as day "))
        ->GroupBy(DB::raw("DAYNAME(created_at)"))
        ->pluck('day');
        return view('product.report', compact('orders', 'total_order', 'day'));
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
    public function update(Request $request, Transaction $transaction, $user_id)
    {
        $transactions = Transaction::with('orders')
        ->where('user_id',$request->user_id)->get();
         $count = Order::where('user_id',$request->user_id)->sum('price');
         $totals = Order::select('total')
         ->where('user_id',$request->user_id)
         ->GroupBy('total')->get();

         $details = Order::select('user_id')
         ->where('user_id',$request->user_id)->get();
        

        
            $data = $totals[0]['total'];
            $counts = $data - $count;
            return view('product.detail', compact('transactions','count','data','counts','details'));
           
       
    }

    public function detail(Request $request,$user_id)
    {
        $detail = Order::select('id')
        ->where('user_id',$request->user_id)->get();
        $data = Order::select('name','address','phone')
        ->where('user_id',$request->user_id)
        ->GroupBy('name','address','phone')->get();
      
        $report = new report();
        $report->name = $data[0]['name'];
        $report->address = $data[0]['address'];
        $report->phone = $data[0]['phone'];
        $report->save();

        $details = Transaction::with('orders')->get();
        $detail->each->delete();
        $details->each->delete();

        return redirect('orders');
    }


    public function data(Request $request)
    {
        $data = Transaction::select('*')->GroupBy('user_id');
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
