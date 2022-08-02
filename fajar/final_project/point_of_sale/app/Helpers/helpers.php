<?php

function money_format($number) {
    $result = number_format($number, 0, ',', '.');
    return $result;
}

function dateFormat($value){
    return date("d M Y , H:i:s",strtotime($value));
}   

function terbilang ($number) {
    $number = abs($number);
    $arr  = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
    $terbilang = '';

    if ($number < 12) {
        $terbilang = ' ' . $arr[$number];
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

function tanggal_indonesia($tgl, $tampil_hari = true)
{
    $nama_hari  = array(
        'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'
    );
    $nama_bulan = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    if ($tampil_hari) {
        $urutan_hari = date('w', mktime(0,0,0, substr($tgl, 5, 2), $tanggal, $tahun));
        $hari        = $nama_hari[$urutan_hari];
        $text       .= "$hari, $tanggal $bulan $tahun";
    } else {
        $text       .= "$tanggal $bulan $tahun";
    }
    
    return $text; 
}


?>