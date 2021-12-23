<?php
    function form_tang($value) {
        return date('H:i:s - d/M/Y', strtotime($value));
    }
?>