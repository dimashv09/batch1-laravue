<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Member;
use App\Models\SalesDetail;
use App\Models\Sale;
use App\Models\User;
use App\Models\Setting;
use PDF;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.sales.index');
    }

    public function data()
    {
        $sale = Sale::orderBy('id', 'desc')->get();
        
        return datatables()
            ->of($sale)
            ->addIndexColumn()
            ->addColumn('created_at', function($sale){
                return dateFormat($sale->created_at);
            })
            ->addColumn('member_code', function($sale){
                return $sale->member['member_code'] ?? '';
            })
            ->addColumn('kasir', function($sale){
                return $sale->user->name ?? '';
            })
            ->addColumn('aksi', function ($sale) {
                return '
                    <button onclick="detail(`'. route('sales.show', $sale->id) .'`)" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>

                    <button onclick="deleteData(`'. route('sales.delete', $sale->id) .'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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
    public function create()
    {
        $sale = new Sale();
        $sale->member_id = null;
        $sale->total_items = 0;
        $sale->total_price = 0;
        $sale->discount = 0;
        $sale->paid = 0;
        $sale->received = 0;
        $sale->user_id = auth()->id();
        $sale->save();


        session(['sales_id' => $sale->id]);

        return redirect()->route('transaction.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sale = Sale::findOrFail($request->sales_id);
        $sale->member_id = $request->member_id;
        $sale->total_items = $request->total_items;
        $sale->total_price = $request->total;
        $sale->discount    = $request->discount;
        $sale->paid        = $request->paid;
        $sale->received    = $request->received;


        $sale->save();

        
        $detail = SalesDetail::where('sales_id', $sale->id)->get();
        foreach($detail as $item){
            $product = Product::find($item->product_id);
            $product->stock -= $item->qty;
            $product->save();
        }

        return redirect()->route('transaction.finish');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = SalesDetail::with('product')->where('sales_id', $id)->get();

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
        $sale = Sale::find($id);

        $detail = SalesDetail::where('sales_id', $sale->id)->get();
        foreach($detail as $item){
            $item->delete();
            
        }
        $sale->delete();

        return response()->json('data berhasil di hapus');
    }

    public function finish()
    {
        $set = Setting::first();
        return view('pages.sales.finish', compact('set'));
    }

    public function notaKecil()
    {
        $setting = Setting::first();
        $sale = Sale::find(session('sales_id'));

        if(! $sale){
            abort(404);
        }

        $detail = SalesDetail::with('product')->where('sales_id', session('sales_id'))->get();

        return view('pages.sales.nota_kecil', compact('setting', 'sale', 'detail'));
    }

    public function notaBesar()
    {
        $setting = Setting::first();
        $sale = Sale::find(session('sales_id'));

        if(! $sale){
            abort(404);
        }

        $detail = SalesDetail::with('product')->where('sales_id', session('sales_id'))->get();
        $pdf = PDF::loadView('pages.sales.nota_besar', compact('setting', 'sale', 'detail'));
        $pdf->setPaper(0, 0, 609, 440, 'potrait');
        return $pdf->stream();
    }
}
