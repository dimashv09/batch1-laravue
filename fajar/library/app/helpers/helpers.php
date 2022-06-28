<?php
use App\Models\Transaction;

function dateFormat($value){
    return date("d M Y , H:i:s",strtotime($value));
}

//notification
function notif(){
    $data = [];
    $today = date('Y-m-d');
    $transactions = Transaction::where('date_end','<', $today)->where('status', '=', 0)->get();
    // $end = date($transactions->date_end);
    //     $difference = date_diff(date_create($today),date_create($transactions->date_end));

    foreach ($transactions as $key=> $transaction) {
        $end = date($transaction->date_end);
        $difference = date_diff(date_create($today),date_create($transaction->date_end))->days;

        $data[$key]['transaction'] = $transaction->id;
        $data[$key]['member'] = $transaction->member->name;
        $data[$key]['date'] = $difference;
    }
    
    return $data;
}

?>