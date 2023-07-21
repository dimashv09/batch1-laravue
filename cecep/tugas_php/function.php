<?php
 
    //   Luas persegi panjang
    function persegi_panjang($panjang, $lebar){
        $Luas = $panjang*$lebar;
        echo "Luas persegi panjang = $Luas";
    }
    persegi_panjang(5, 10);

    echo "<hr>";


// Luas persegi
function persegi($sisi){
    $luas = $sisi*$sisi;
    echo "Luas persegi = $luas";
}
persegi(7); 

echo "<hr>";


// Luas segtiga
function luas_segitiga($alas, $tinggi){
    $luas = 1/2 * ($alas * $tinggi);
    echo " Luas segitiga = $luas";
}
luas_segitiga(10, 15); 

echo "<hr>";

// volume kubus
function volume_kubus($sisi){
    $volume = $sisi * $sisi * $sisi;
    echo "Volume kubus = $volume";
}
volume_kubus(5);

echo "<hr>";

// Volume prisma tegak segitiga
function volume_prisma($alas, $tinggi){
    $volume = $alas * $tinggi;
    echo "Volume prisma segitiga = $volume";
}
volume_prisma(6, 9); 
?>