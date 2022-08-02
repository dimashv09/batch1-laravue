<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Member;
use App\Models\SalesDetail;
use App\Models\Sale;
use App\Models\Setting;

class SalesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = Product::orderBy('product_name')->get();
        $member = Member::orderBy('name')->get();
        $discount = Setting::first()->discount ?? 0;

        // dd($product, $member, $setting);

        if($sales_id = session('sales_id')){
            $sale = Sale::find($sales_id);
            $memberSelected = $sale->member ?? new Member();
            
            return view('pages.sales_detail.index', compact('product', 'member', 'discount', 'sales_id', 'memberSelected', 'sale'));
        }else {
            if(auth()->user()->role('admin')){
                return redirect()->route('transaction.new');
            }else{
                return redirect()->route('home');
            }
        }

        
    }

    public function data($id)
    {
        $detail = SalesDetail::with('product')
            ->where('sales_id', $id)
            ->get();

        // return $detail;

        $data = array();
        $total = 0;
        $total_items = 0;
        
        foreach ($detail as $item) {
            $row = array();
            $row['product_code']    = $item->product['product_code'];
            $row['product_name']    = $item->product['product_name'];
            $row['price']  = 'Rp. '. money_format($item->price);
            $row['qty']             = '<input type="number" class="form-control input-sm quantity" data-id="'. $item->id .'" value="'. $item->qty .'">';
            $row['discount']        = $item->discount . ' %';
            $row['subtotal']        = 'Rp. '. money_format($item->subtotal);
            $row['aksi']           = '<button onclick="deleteData(`'. route('transaction.destroy', $item->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
            ';

            $data[] = $row;

            $total += $item->price * $item->qty;
            $total_items += $item->qty;
        }

        $data[] = [
            'product_code'    =>'<div class="total invisible">'. $total .'</div>
                                <div class="total_items invisible">'. $total_items .'</div>',
            'product_name'    => '',
            'price'           => '',
            'qty'             => '',
            'discount'        => '',
            'subtotal'        => '',
            'aksi'            => '',
        ];
        
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'qty', 'product_code'])
            ->make(true);
    }

    public function loadForm($discount = 0, $total,  $received)
    {
        $paid = $total - ($discount / 100  * $total);

        $kembali = ($received != 0) ? $received - $paid : 0;

        $data = [
            'totalrp' => money_format($total),
            'paid' => $paid,
            'paidrp' => money_format($paid),
            'terbilang' => ucwords(terbilang($paid). 'Rupiah'),
            'kembalirp' => money_format($kembali),
            'kembali_terbilang' => ucwords(terbilang($kembali). 'Rupiah'),
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $detail = new SalesDetail();
        $detail->sales_id = $request->sales_id;
        $detail->product_id = $product->id;
        $detail->price = $product->sell_price;
        $detail->qty = 1;
        $detail->discount = 0;
        $detail->subtotal = $product->sell_price;
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
        $detail = SalesDetail::find($id);
        $detail->qty = $request->qty;
        $detail->subtotal = $detail->price * $request->qty;
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
        $detail = SalesDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }
}
