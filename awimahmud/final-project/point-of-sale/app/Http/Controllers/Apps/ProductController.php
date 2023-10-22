<?php

namespace App\Http\Controllers\Apps;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\ImportProducts;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use League\Config\Exception\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get products
        $products = Product::when(Request()->q, function($products) {
          $products->where('title', 'like', '%' . Request()->q . '%');  
        })->latest()->paginate(5);

        $currentPage = $products->currentPage();
        $perPage = $products->perPage();

        $startIndex = ($currentPage - 1) * $perPage;
        

        return Inertia::render('Apps/Products/Index', [
            'products' => $products,
            'startIndex' => $startIndex
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all categories
        $categories = Category::all();

        return Inertia::render('Apps/Products/Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //validate
            $this->validate($request, [
                'image'         => 'required|image|mimes:jpeg,jpg,png|max:2000',
                'barcode'       => 'required|unique:products',
                'title'         => 'required',
                'category_id'   => 'required',
                'buy_price'     => 'required',
                'sell_price'    => 'required',
                'stock'         => 'required',
            ]);

            //upload image
            //upload file
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/products', $image->hashName());
            Product::create([
                'image'         => $imagePath,
                'barcode'       => $request->barcode,
                'title'         => $request->title,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'buy_price'     => $request->buy_price,
                'sell_price'    => $request->sell_price,
                'stock'         => $request->stock,
            ]);
    
            //redirect
            return redirect()->route('apps.products.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function edit(Product $product)
    {
        //get all categories
        $categories = Category::all();

        //return by Inertia
        return Inertia::render('Apps/Products/Edit', [
            'categories' => $categories,
            'product' => $product
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validate
        $this->validate($request, [
            'barcode'       => 'required|unique:products,barcode,' . $product->id,
            'title'         => 'required',
            'category_id'   => 'required',
            'buy_price'     => 'required',
            'sell_price'    => 'required',
            'stock'         => 'required',
        ]);


        //update with condition
        if($request->file('image')){
            //remove old image
            Storage::disk('local')->delete('public/products/'.basename($product->image));

            //upload new image
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/products', $image->hashName());

            //update product with new image
            $product->update([
                'image'         => $imagePath,
                'barcode'       => $request->barcode,
                'title'         => $request->title,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'buy_price'     => $request->buy_price,
                'sell_price'    => $request->sell_price,
                'stock'         => $request->stock,
            ]);
                        
        }else {
            //update product without image
            $product->update([
                'barcode'       => $request->barcode,
                'title'         => $request->title,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'buy_price'     => $request->buy_price,
                'sell_price'    => $request->sell_price,
                'stock'         => $request->stock,
            ]);
        }

        //redirect to Index
        return redirect()->route('apps.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find product id
        $product = Product::findOrfail($id);
        
        //remove image
        Storage::disk('local')->delete('public/products/'.basename($product->image));

        //delete
        $product->delete();

        //redirect to index
        return redirect()->route('apps.products.index');
    }

}