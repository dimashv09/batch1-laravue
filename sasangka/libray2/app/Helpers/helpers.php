<?php

use App\Models\Transaction;


    function  convert_date ($value) {
        return date ( 'H:i:s - d M Y', strtotime( $value));
    }

    function dateDifference($date_1, $date_2, $differenceFormat = '%a')
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
}

function transactionAlert()
{
    $data = [];
    $currentDate = date('Y-m-d');
    $transactions = Transaction::where('date_end', '<', $currentDate)
        ->where('status', 0)->get();

    foreach ($transactions as $index => $transaction) {
        $data[$index]["transaction"] = $transaction->id;
        $data[$index]["member"] = $transaction->member->name;
        $data[$index]["day_late"] = dateDifference($transaction->date_end, $currentDate);
    }

    return $data;
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
}