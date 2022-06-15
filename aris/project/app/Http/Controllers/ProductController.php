<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
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
             // return $user;
             $product = Product::find($id);
             $cart = new Cart();
             $cart->user_id = $user->id;
             $cart->name = $user->name;
             $cart->phone = $user->phone;
             $cart->address = $user->address;
             $cart->product_title = $product->title;
             $cart->price = $product->price;
             $cart->quantity = $request->quantity;
             // return $cart;
             $cart->save();


             return redirect()->back();


        }else{
            return redirect('login');
        }
       



    }

    public function updatecart(Request $request, $id)
    {
        if (Auth::user()) {

             // $user = auth()->user()->id;
             // $product = Product::find($id);
             $cart = Cart::find($id);
             // $cart->name = $user->name;
             // $cart->phone = $user->phone;
             // $cart->address = $user->address;
             // $cart->product_title = $product->title;
             // $cart->price = $product->price;
             $cart->quantity = $request->quantity;
             
             $cart->save();


             return redirect()->back();


        }else{
            return redirect('login');
        }
       



    }

    public function showcart()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $carts = cart::where('user_id', $user->id)->get();
            $count = cart::where('user_id',$user->id)->count();
            return view('product.showcart', compact('count','carts'));
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
