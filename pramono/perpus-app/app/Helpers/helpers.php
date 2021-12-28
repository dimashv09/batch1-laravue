<?php
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
