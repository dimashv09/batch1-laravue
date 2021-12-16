<?php
/**
 * function costum format tanggal
 */
function custom_date ($value) {
    return date('d/m/Y - H:i:s', strtotime($value));
}
