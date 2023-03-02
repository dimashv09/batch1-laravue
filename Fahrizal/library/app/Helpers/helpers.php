<?php
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
?>