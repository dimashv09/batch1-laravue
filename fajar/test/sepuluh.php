<?php

function kabisat($value){

    $tahun = $value;
    if($tahun%4 ==0){
        echo "$tahun Tahun Kabisat";
    }else if($tahun%4!=0){
        echo "$tahun Bukan tahun Kabisat"; 
    }
}

print kabisat(2024);