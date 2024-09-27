<?php
$A = "";
$B = "Rumus Menghitung Bangun Ruang";
function kubus()
{
    $sisi = 10;
    $volume = $sisi * $sisi * $sisi;
    echo " <b>1. Rumus Menghitung Volume Kubus</b><br>";
    echo " Rumus Volume : V = S<sup>3</sup><br>";
    echo " Diketahui S adalah panjang rusuk kubus / sisi<br><br>";
    echo " Panjang Sisi Kubus (s) : $sisi cm<br>";
    echo " V = $sisi x $sisi x $sisi  <br>";
    echo " Hasil Volume nya adalah : $volume ";
}
function limas()
{
    $p = 1 / 3;
    $la = 48;
    $t = 16;
    $volume = $p * $la * $t;
    echo " <b>2. Rumus Menghitung Volume Limas</b><br>";
    echo " Rumus Volume : V = 1/3 x Luas Alas x Tinggi<br><br>";
    echo " Luas Alas : $la cm<br>";
    echo " Tinggi : $t cm<br>";
    echo " V = 1/3 x $la x $t  <br>";
    echo " Hasil Volume nya adalah : $volume ";
}
function prisma()
{
    $la = 50;
    $t = 3;
    $volume = $la * $t;
    echo " <b>3. Rumus Menghitung Volume Prisma</b><br>";
    echo " Rumus Volume : V = Luas Alas x Tinggi<br><br>";
    echo " Luas Alas : $la cm<br>";
    echo " Tinggi : $t cm<br>";
    echo " V = $la x $t  <br>";
    echo " Hasil Volume nya adalah : $volume ";
}
kubus();
echo "<br><br><br>";
limas();
echo "<br><br><br>";
prisma();
echo "<br><br><br>";
echo " <i>$B</i> <br>";
echo " $A <br>";
?>