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
             // dd($product);
            $carts = Cart::all();
          
            // $cart = [''];
            // foreach($carts as $cart){
            //     $cart->product_id;
            //     $cart->user_id;
            // }
            // dd($product);
            //  if ($product[0]->id != $cart->product_id || $cart->user_id != auth()->user()->id) {
                  $cart = new Cart();
             $cart->user_id = $user->id;
             $cart->name = $user->name;
             $cart->phone = $user->phone;
             $cart->address = $user->address;
             $cart->product_title = $product->title;
             $cart->product_id = $product->id;
             $cart->quantity = $request->quantity;
             $cart->price = $product->price * $cart->quantity;
             $cart->save();
             return redirect()->back();
          //    }else{
             
          //    $cart = Cart::find($id);
          //    $cart->quantity = $request->quantity;
          //    $cart->price = $product->price * $cart->quantity;
          //    $cart->save();
          //       return redirect()->back();
          // }

        }else{
            return redirect('login');
        }
       



    }


    public function order(Request $request)
    {
            $user = auth()->user();
            // dd($user);
            $cart = cart::where('user_id', $user->id)->get();
            // dd($carts);
            $carts = Cart::where('user_id', Auth::user()->id)->sum('quantity');
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            // dd($count);
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');
            
            // dd($total);
            // $transaction = Cart::sum('price');
            // dd($transaction);
            //     $data = $request->harga;

            //     $total = $data -= $transaction;
            // dd($request->product_title);
            // dd($cart);
            foreach ( $cart as $key => $data) {
                // code...
          
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
            // dd($user);
            $cart = cart::where('user_id', $user->id)->get();
            // dd($carts);
            $carts = Cart::where('user_id', Auth::user()->id)->sum('quantity');
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            // dd($count);
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');

            // dd($request->product_title);
            // dd($cart);
            foreach ( $cart as $key => $data) {
                // code...
          
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

             // $user = auth()->user()->id;
             // $product = Product::find($id);
             $cart = Cart::with('product')->get();
             $data = $cart->product->id;
             return $data;
              

              // $cart->total = $cart->price * $cart->quantity;
             // dd($cart->product);
               
       // foreach($carts as $cart){
       //      $cart->total = $cart->product_price * $cart->cart_list_quantity;
       //      $cart->total_sum = $cart->sum('total');
       //  }
             // $cart->name = $user->name;
             // $cart->phone = $user->phone;
             // $cart->address = $user->address;
             // $cart->product_title = $product->title;
             // $cart->price = $product->price;

             $product = Product::find($id);
             // dd($product);
             $cart->quantity = $request->quantity;
             $cart->price = $product[0]['price'] * $cart->quantity;
             // if () {
             //     // code...
             // }
             
             // dd($total);
             // $carts->price = $request->price;

             // foreach($carts as $cart){
             //    $cart->total = $cart->price * $cart->quantity;

             // }

             
             $cart->save();


             return redirect()->back();


        }else{
            return redirect('login');
        }
       

// UPDATE trans t
//     INNER JOIN (
//         select user_id, sum(amount) sumAmount
//         from trans
//         group by user_id
//     ) subSum on subSum.user_id = t.user_id
// SET t.amount = subSum.sumAmount

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


    public function pdf()
    {


        if (auth()->user()) {
            $user = auth()->user();
            $carts = cart::where('user_id', $user->id)->get();
            $count = Cart::where('user_id', Auth::user()->id)->sum('price');
            $total = Cart::where('user_id', Auth::user()->id)->sum('price');
            
            $pdf = PDF::loadView('product.invoice',['carts'=>$carts,'count'=>$count,'total'=>$total])->setPaper('A4','potrait');;
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
