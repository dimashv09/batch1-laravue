<?php

$arr = [4,2,6,88,3,11];

$low = $arr[0];
$high = $arr[0];

foreach($arr as $data){
    if ($data<$low){
        $low = $data;
    }
    if($data>$high){
        $high= $data;
    }
}

echo "nilai terkecil adalah = $low <br><br>";

echo "nilai terbesar adalah = $high";