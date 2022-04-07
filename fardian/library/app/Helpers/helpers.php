<?php
use App\Models\Transaction;
use App\Models\Member;


    function convert_date($value){
        return date('Y-m-d', strtotime($value));
    }
    function notification(){
        $date = date('Y-m-d');
        $transaction = Transaction::where('transactions.status','=','0')
                                          ->where('transactions.date_end','>',$date)
                                          ->get();
        $data = [
            'transaction' => $transaction,
            'count' => $transaction->count()
        ];
        return $data;
        
    }

?>