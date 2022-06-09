<?php

function dateFormat($value){
    return date("d M Y , H:i:s",strtotime($value));
}

?>