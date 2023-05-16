<?php

namespace App\Http\Controllers\Apps;

use Inertia\Inertia;
use App\Models\Profit;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\ProfitExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProfitController extends Controller
{
    //index
    public function index()
    {
        return Inertia::render('Apps/Profits/Index');
    }

    //filter
    public function filter(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        //get data profits by range date
        $profits = Profit::with('transaction.details.product')->whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '<=', $request->end_date)->get();

        //get total
        $total =  Profit::whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '<=', $request->end_date)->sum('total');
                        
        //redirect
        return Inertia::render('Apps/Profits/Index', [
            'profits' => $profits,
            'total'   => (int)$total
        ]);
    }

    public function export(Request $request)
    {
        return Excel::download(new ProfitExport($request->start_date, $request->end_date), 'profits : ' .$request->start_date. ' — ' .$request->end_date. '.xlsx');    
    }

    //pdf
    public function pdf(Request $request)
    {
        
        //get data profits by range date
        $profits = Profit::with('transaction')->whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '<=', $request->end_date)->get();

        //get total profit by range ate
        $total = Profit::whereDate('created_at', '>=', $request->start_date)->whereDate('created_at', '>=', $request->end_date)->sum('total');
        
        //load view pdf with data
        $pdf = PDF::loadView('exports.profits', compact('profits', 'total'));

        return $pdf->download('profits : '.$request->start_date.' - '.$request->end_date.'.pdf');

        
    }

}