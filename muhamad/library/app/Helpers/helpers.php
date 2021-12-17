<?php
function convertDate($date)
{
    return date('d M Y', strtotime($date));
}
