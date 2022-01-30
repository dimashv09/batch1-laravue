<?php

    function  convert_date ($value) {
        // dd($value);
        return date ( 'H:i:s - d M Y', strtotime( $value));
    }

?>