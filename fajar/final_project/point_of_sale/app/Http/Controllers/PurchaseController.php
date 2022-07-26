<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('pages.purchase.index', compact('supplier'));
    }

    public function data()
    {
        $purchase = Purchase::with(['supplier'])->orderBy('id', 'desc')->get();
        
        return datatables()
            ->of($purchase)
            ->addIndexColumn()
            ->addColumn('created_at', function($purchase){
                return dateFormat($purchase->created_at);
            })
            ->addColumn('aksi', function ($purchase) {
                return '
                    <button onclick="detail(`'. route('purchase.show', $purchase->id) .'`)" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>

                    <button onclick="deleteData(`'. route('purchase.destroy', $purchase->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) 
    {
        $purchase = new Purchase();
        $purchase->supplier_id = $id;
        $purchase->total_items = 0;
        $purchase->total_price = 0;
        $purchase->discount = 0;
        $purchase->paid = 0;
        $purchase->save();

        session(['purchase_id'=> $purchase->id]);
        session(['supplier_id'=> $purchase->supplier_id]);


        return redirect()->route('purchase_detail.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = Purchase::findOrFail($request->purchase_id);
        $purchase->total_items = $request->total_items;
        $purchase->total_price = $request->total;
        $purchase->paid        = $request->paid;
        $purchase->discount    = $request->discount;
        $purchase->update();


        $detail = PurchaseDetail::where('purchase_id', $purchase->id)->get();
        foreach($detail as $item){
            $product = Product::find($item->product_id);
            $product->stock += $item->qty;
            $product->update();
        }

        return redirect()->route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = PurchaseDetail::with('product')->where('purchase_id', $id)->get();

        return datatables()
        ->of($detail)
        ->addIndexColumn()
        ->addColumn('product_code', function($detail){
            return $detail->product->product_code;
        })
        ->addColumn('product_name', function($detail){
            return $detail->product->product_name;
        })
        ->addColumn('created_at', function($detail){
            return dateFormat($detail->created_at);
        })
        ->make(true);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);

        $detail = PurchaseDetail::where('purchase_id', $purchase->id)->get();
        foreach($detail as $item){
            $item->delete();
            
        }
        $purchase->delete();

        return response()->json('data berhasil di hapus');
    }
}
