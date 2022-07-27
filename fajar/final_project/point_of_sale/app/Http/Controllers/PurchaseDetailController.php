<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\PurchaseDetail;


class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $purchase_id = session('purchase_id'); //get id from purchaseController
        $product = Product::orderBy('product_name')->get();
        $supplier = Supplier::find(session('supplier_id'));
        $discount = Purchase::find($purchase_id)->discount ?? 0;
        
        // return $discount;


        if (! $supplier) {
            abort(404);
        }

        return view('pages.purchase_detail.index', compact('purchase_id', 'product', 'supplier', 'discount'));
    }

    public function data($id)
    {
        $detail = PurchaseDetail::with('product')
            ->where('purchase_id', $id)
            ->get();

        $data = array();
        $total = 0;
        $total_items = 0;
        
        foreach ($detail as $item) {
            $row = array();
            $row['product_code']    = $item->product['product_code'];
            $row['product_name']    = $item->product['product_name'];
            $row['purchase_price']  = 'Rp. '. money_format($item->purchase_price);
            $row['qty']             = '<input type="number" class="form-control input-sm quantity" data-id="'. $item->id .'" value="'. $item->qty .'">';
            $row['subtotal']        = 'Rp. '. money_format($item->subtotal);
            $row['aksi']           = '<button onclick="deleteData(`'. route('purchase_detail.destroy', $item->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
            ';

            $data[] = $row;

            $total += $item->purchase_price * $item->qty;
            $total_items += $item->qty;
        }

        $data[] = [
            'product_code'    =>'<div class="total invisible">'. $total .'</div>
                                <div class="total_items invisible">'. $total_items .'</div>',
            'product_name'    => '',
            'purchase_price'  => '',
            'qty'             => '',
            'subtotal'        => '',
            'aksi'            => '',
        ];
        
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'qty', 'product_code'])
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
        $product = Product::where('id', $request->product_id)->first();

        if(! $product){
            return response()->json("Data gagal disimpan", 400);
        }

        $detail = new PurchaseDetail();
        $detail->purchase_id = $request->purchase_id;
        $detail->product_id = $product->id;
        $detail->purchase_price = $product->pruchase_price;
        $detail->qty = 1;
        $detail->subtotal = $product->pruchase_price;
        $detail->save();

        return response()->json("Data berhasil disimpan", 200);

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
        $detail = PurchaseDetail::find($id);
        $detail->qty = $request->qty;
        $detail->subtotal = $detail->purchase_price * $request->qty;
        $detail->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = PurchaseDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }

    public function loadForm($discount, $total)
    {
        $paid = $total - ($discount / 100  * $total);

        $data = [
            'totalrp' => money_format($total),
            'paid' => $paid,
            'paidrp' => money_format($paid),
            'terbilang' => ucwords(terbilang($paid). 'Rupiah')
        ];

        return response()->json($data);
    }
}
