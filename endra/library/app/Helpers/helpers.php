<?php

use App\Models\Transaction;

function convert_date($value)
{
    return date('H:i:s - d M Y', strtotime($value));
}

function getNotification()
{
    $transactions = Transaction::where('date_end', '<', date('Y-m-d'))
        ->where('status', 0)
        ->get();

    $data = [];

    foreach ($transactions as $key => $trans) {
        $data[$key]['member'] = $trans->member->name;
        $data[$key]['late'] = date_diff();
    }
}
