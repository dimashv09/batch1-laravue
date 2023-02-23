<?php
function convert_date($value)
{
    return date('d M Y', strtotime($value));
}
?>