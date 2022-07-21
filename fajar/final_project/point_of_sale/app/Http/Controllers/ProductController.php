<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use PDF;
use DNS1D;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('pages.product.index', compact('category'));
    }

    public function data()
    {
        $product = Product::with('category')->get();
        
        return datatables()
            ->of($product)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($product) {
                return '<input type="checkbox" name="id[]" value="'. $product->id .'" >';
            })
            ->addColumn('product_code', function ($product) {
                return '<span class="badge badge-success">'. $product->product_code .'</span>';
            })
            ->addColumn('pruchase_price', function($product){
                return money_format($product->pruchase_price);
            })
            ->addColumn('sell_price', function($product){
                return money_format($product->sell_price);
            })
            ->addColumn('aksi', function ($product) {
                return '<button onclick="editForm(`'. route('product.update', $product->id) .'`)" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i>
                    </button>
                    <button onclick="deleteData(`'. route('product.destroy', $product->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi', 'product_code', 'checkbox'])
            ->make(true);
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
        $product = Product::latest()->first() ?? new Product();
        $request['product_code'] = 'P'. tambah_0_first((int)$product->id +1, 6);

        
        $product = Product::create($request->all());

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return response()->json($product);
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
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response(null, 204);
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $product = Product::find($id);

            $product->delete();
        }
        return response(null, 204);
    }

    public function printBarcode(Request $request)
    {
        $dataproduct = array();
        foreach ($request->id as $id) {
            $product = Product::find($id);
            $dataproduct[] = $product;
        }

        $no  = 1;
        $pdf = PDF::loadView('pages.product.barcode', compact('dataproduct', 'no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('product.pdf');

    }
}