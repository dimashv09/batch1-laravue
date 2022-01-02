<?php

use App\Models\Transaction;

/**
 * function costum format tanggal
 */
function custom_date ($value) {
    return date('d M Y', strtotime($value));
}

function dateDifference($start_date, $end_date)
{
    // calulating the difference in timestamps
    $diff = strtotime($start_date) - strtotime($end_date);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}

function select_m2m($opt_val, $name, $model, $relation) {
    // masih saya pelajari karena nyontek dari stackoverflow hehe.
    $has_select = (old($name) != null && in_array($opt_val, old($name))) || (isset($model) && in_array($opt_val, $relation->toArray())) ? 'selected' : '';
    return $has_select;
}

function pinjamanTelat() {
    $data = [];
    $currentDate = date('Y-m-d');
    $obj = Transaction::where('end', '<', $currentDate)->where('status', 0)->get();
    foreach ($obj as $key => $value) {
        $data[$key]["transaction"] = $value->id;
        $data[$key]["member"] = $value->member->name;
        $data[$key]["delay"] = dateDifference($value->end, $currentDate);
    }

    return $data;
}
