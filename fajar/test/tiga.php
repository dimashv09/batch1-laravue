<?php
//belum solve

function printDigitValue($data){

    $string = preg_replace("/[^0-9]/","",$data);
    $length = strlen($string);

    for($i = 0; $i < $length; $i++){
            echo $string[$i];
        }
    }

print printDigitValue("9.86-A5.321");