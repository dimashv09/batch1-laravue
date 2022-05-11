<?php

function balik($kata){

    $length = strlen($kata);
    $revert = "";

    for($i=($length -1); $i>=0; $i-- ){
        $revert.=$kata[$i];
    }
    return $revert;
}

print balik("abcde");