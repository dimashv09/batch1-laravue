<?php
function convertDate($date)
{
    return date('d M Y', strtotime($date));
}

function getRemainingDays($date1, $date2)
{
    $start = new DateTime($date1);
    $end = new DateTime($date2);
    $interval = $start->diff($end);
    return $interval->d > 1 ? "{$interval->d} Days left" : "Expired";
}
