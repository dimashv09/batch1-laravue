<?php

use App\Models\Transaction;

function convertDate($date)
{
    return date('d M Y', strtotime($date));
}

// function getRemainingDays($date1, $date2)
// {
//     $start = new DateTime($date1);
//     $end = new DateTime($date2);
//     $interval = $start->diff($end);
//     return $interval->d > 1 ? "{$interval->d} Days" : "1 Day";
// }

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
}
