<?php

$data = ["","satu", "dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepulu","sebelas"];

$b = "belas";
$p = "puluh";
$x = 99;
$nil = "";



if ($x === 0) {
    $nil = "nol";
}elseif ($x < 12) {
    $nil = $data[$x];
}elseif($x < 20){
    $nil = $data[$x-(10)] . " $b";
}elseif($x < 100){
    $nil = $data[$x/(10)] . " $p " . $data[$x%10];
}elseif($x == 100){
    $nil = "seratus ";
}else {
    $nil = "masukan 1-100";
}


print $x ."<br>".$nil;
