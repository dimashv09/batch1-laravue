<?php 
function luas ($sisi1, $sisi2){
    $hasil = $sisi1 * $sisi2;
    echo "$sisi1*$sisi2=$hasil";
}
luas(10,20,);

echo "<br>";

function balok($p,$l,$t){
    $hasil = $p*$l*$t;
    echo "$p*$l*$t = $hasil";
}
balok(2,4,5);
echo "<br>";
function persegi_panjang($p, $l){
    $hasil = $p*$l;
    echo "$p*$l=$hasil";
}
persegi_panjang(3,4);
echo "<br>";

function prisma($b,$p,$t,$l){
    $V=$b*$p*$t*$l;
echo "$b*$p*$t*$l= $V";
}
prisma(1,2,3,4);
echo "<br>";
function jajar($a, $t){
    $hasil =$a*$t;
    echo "$a*$t=$hasil";
}
jajar(8,0);
?>