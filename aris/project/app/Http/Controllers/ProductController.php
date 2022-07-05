<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use PDF;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('product.index');
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

    public function addcart(Request $request, $id)
    {
        if (auth()->user()) {
           

            $user = auth()->user();
            $product = Product::find($id);
            $carts = Cart::all();
            $cart = Cart::find($id);
            // dd($cart);
          
            $cart = [];
            foreach($carts as $cart){
                $cart->product_id;
                $cart->user_id;
            }

            if(empty($cart)){
                $cart = new Cart();
             $cart->user_id = $user->id;
             $cart->name = $user->name;
             $cart->phone = $user->phone;
             $cart->address = $user->address;
             $cart->product_title = $product->title;
             $cart->product_id = $product->id;
             $cart->quantity = $request->quantity;
             $cart->total = $product->price;
             $cart->price = $product->price * $cart->quantity;
             $cart->save();
             return redirect()->back();

            }else{
             if ($product->id != $cart->product_id || $cart->user_id != auth()->user()->id) {
                  $cart = new Cart();
             $cart->user_id = $user->id;
             $cart->name = $user->name;
             $cart->phone = $user->phone;
             $cart->address = $user->address;
             $cart->product_title = $product->title;
             $cart->product_id = $product->id;
             $cart->quantity = $request->quantity;
             $cart->total = $product->price;
             $cart->price = $product->price * $cart->quantity;
             $cart->save();
             return redirect()->back();
             }else{
             
                return redirect()->back();
          }
      }

        }else{
            return redirect('login');
        }
       



    }


    public function order(Request $request)
    {

            $this->validate($request,[

                'harga'=>'required',

            ]);
            $user = auth()->user();
            $cart = cart::where('user_id', $user->id)->get();
            $carts = Cart::where('user_id', Auth::user()->id)->sum('quantity');
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');
    
            foreach ( $cart as $key => $data) {
               
            $order = new Order();
            $order->name = $user->name;
            $order->phone = $user->phone;
            $order->address = $user->address;
            $order->product_name = $data->product_title;
            $order->price = $data->price;
            $order->product_id = $data->product_id;
            $order->quantity = $data->quantity;
            $order->user_id = $user->id;
            $order->total = $request->harga;
            $order->save();

            $transaction = new Transaction();
            $transaction->user_id = $order->user_id;
            $transaction->order_id = $order->id;
            $transaction->save();
       
        }

       $car = Cart::where('user_id',auth()->user()->id)->delete();
         return redirect()->back()->with('success','order anda sudah berhasil');

    }

     public function payment(Request $request)
    {
            $user = auth()->user();
            $cart = cart::where('user_id', $user->id)->get();
            $carts = Cart::where('user_id', Auth::user()->id)->sum('quantity');
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');

            foreach ( $cart as $key => $data) {

            $order = new Order();
            $order->name = $user->name;
            $order->phone = $user->phone;
            $order->address = $user->address;
            $order->product_name = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->user_id = $user->id;
            $order->save();
    
        }

        DB::table('carts')->where('user_id',auth()->user()->id)->delete();
         return redirect()->back()->with('success','order anda sudah berhasil');

    }

    public function updatecart(Request $request, $id)
    {
        if (Auth::user()) {

            $cart = Cart::find($id);
            $products = $cart->total;
            $cart->quantity = $request->quantity;
            $cart->price = $products * $cart->quantity;
            $cart->save();

            return redirect()->back();

        }else{
            return redirect('login');
        }
    }


    public function orders()
    {
        return view('product.order');
    }

     public function apiorder(Request $request)
    {
        $orders = Order::all();
        $datatables = datatables()->of($orders)->addIndexColumn();

        return $datatables->make(true);
    }

    public function showcart(Request $request)
    {
        if (auth()->user()) {
            $user = auth()->user();
            $carts = cart::where('user_id', $user->id)->get();
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            $total = Cart::where('user_id', Auth::user()->id)->sum('price'); 
            $datas = $request->harga;
            $data = 0;
            $data1 = $data + $request->harga;
            $transaction = $data1 -= $total;

        
            return view('product.showcart', compact('count','carts','total','transaction','datas'));
        }else{
            
            return redirect('/login');
        }
        
    }


    public function pdf(Request $request)
    {


        if (auth()->user()) {
            $user = auth()->user();
            $carts = cart::where('user_id', $user->id)->get();
            $date = date('d-M-Y');
            foreach($carts as $cart){
                $cart->name;
                $cart->phone;
             }
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            $datas = $request->harga;
            $total = $datas - $count;
            // dd($request->harga);
            $pdf = PDF::loadView('product.invoice',['carts'=>$carts,'count'=>$count,'cart'=>$cart,'total'=>$total,'date'=>$date,'datas'=>$datas])->setPaper('A4','potrait');
            return $pdf->download('invoice.pdf');
        }else{
            
            return redirect('/login');
        }


       

    }

    public function delete($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function api(Request $request)
    {
        $products = Product::all();
        $datatables = datatables()->of($products)->addIndexColumn();

        return $datatables->make(true);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            // code...
        }
        $products = Product::where('title','Like','%'.$search.'%')->get();

        return view('user.home', compact('products'));
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
        $product = new Product();
        $this->validate($request,[
            'title' => 'required',
            'price'=> 'required',
            'quantity' => 'required',
            'file'=> 'required',
           
        ]);

        $image = $request->file;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);

         $product->title = $request->title;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->quantity = $request->quantity;
         $product->image = $imagename;
         $product->save();

         return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $this->validate($request,[
            'title' => 'required',
            'price'=> 'required',
            'quantity' => 'required',
            'file'=> 'required',
           
        ]);

        $image = $request->file;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);

         $product->title = $request->title;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->quantity = $request->quantity;
         $product->image = $imagename;
         $product->save();

         return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
