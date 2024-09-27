<?php

use App\Models\Member;
use App\Models\Transaction;

function convert_date($value)
{
    return date('d M Y', strtotime($value));
}

function date_difference($date_start, $date_end)
{
    $datetime1 = new DateTime($date_start);
    $datetime2 = new DateTime($date_end);
    $interval = $datetime1->diff($datetime2);
    $days = $interval->format('%a');
    return $days;
}

function late_notification()
{
    $data = [];
    $today = date('Y-m-d');
    $members = Transaction::where('date_end', '<', $today)->where('status', 0)->get();
    foreach ($members as $key => $m) {
        $data[$key]["transaction"] = $m->id;
        $data[$key]["member"] = $m->member->name;
        $data[$key]["delay"] = date_difference($m->date_end, $today);
    }
    return $data;
}
?>