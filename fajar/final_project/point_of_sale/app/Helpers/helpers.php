<?php

function money_format($number) {
    $result = number_format($number, 0, ',', '.');
    return $result;
}

function terbilang ($number) {
    $number = abs($number);
    $arr  = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $terbilang = '';

    if ($number < 12) {
        $terbilang = ' ' . $baca[$number];
    } elseif ($number < 20) { 
        $terbilang = terbilang($number -10) . ' belas';
    } elseif ($number < 100) { 
        $terbilang = terbilang($number / 10) . ' puluh' . terbilang($number % 10);
    } elseif ($number < 200) { 
        $terbilang = ' seratus' . terbilang($number -100);
    } elseif ($number < 1000) { 
        $terbilang = terbilang($number / 100) . ' ratus' . terbilang($number % 100);
    } elseif ($number < 2000) {
        $terbilang = ' seribu' . terbilang($number -1000);
    } elseif ($number < 1000000) { 
        $terbilang = terbilang($number / 1000) . ' ribu' . terbilang($number % 1000);
    } elseif ($number < 1000000000) { 
        $terbilang = terbilang($number / 1000000) . ' juta' . terbilang($number % 1000000);
    }

    return $terbilang;
}


function tambah_0_first($value, $threshold = null)
{
    return sprintf("%0". $threshold . "s", $value);
}

?>