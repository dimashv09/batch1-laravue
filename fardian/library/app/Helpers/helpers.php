<?php
use App\Models\Transaction;
use App\Models\Member;


    function convert_date($value){
        return date('Y-m-d', strtotime($value));
    }
    function notification(){
        $date = date('Y-m-d');
        return $transaction = Transaction::select('members.name')
                                          ->join('members','members.id','=','transactions.member_id')
                                          ->where('transactions.status','=','0')
                                          ->where('transactions.date_end','>',$date)
                                          ->get();
        
    }

?>