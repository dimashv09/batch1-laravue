<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
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
        $orders = Order::all();
        return view('product.order', compact('orders'));
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
         $user = auth()->user();
            // dd($user);
            $order = Order::where('user_id', $user->id)->get();
            // dd($carts);
            $orders = Order::where('user_id', Auth::user()->id)->sum('quantity');
            $count = Order::where('user_id', Auth::user()->id)->sum('price');
            // dd($count);
            $total = Order::where('user_id', Auth::user()->id)->sum('price');

            // dd($request->product_title);
            // dd($cart);
            foreach ( $order as $key => $data) {
                // code...
          
            $order = new Transaction();
            $order->name = $user->name;
            $order->product_name = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->user_id = $user->id;
            $order->status = 'not delivered';
            $order->save();


           
        }

        DB::table('carts')->where('user_id',auth()->user()->id)->delete();
         return redirect()->back()->with('success','order anda sudah berhasil');
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
