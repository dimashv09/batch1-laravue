<?php

namespace App\Exports;

use App\Models\Profit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProfitExport implements FromView
{
    protected $start_date;
    protected $end_date;
    
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    
    public function view(): View
    {
        return view('exports.profits', [
            'profits' => Profit::with('transaction.details.product')->whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->get(),
            'total' => Profit::whereDate('created_at', '>=', $this->start_date)->whereDate('created_at', '<=', $this->end_date)->sum('total')
        ]);
    }
}