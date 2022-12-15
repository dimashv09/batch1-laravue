<?php

require_once("Bangun_datar.php");

$luas = new Luas();

#hitung  Luas Persegi Panjang
$p = 4;
$l = 5;
echo $luas->persegi_panjang($p, $l);

#output 20

?>