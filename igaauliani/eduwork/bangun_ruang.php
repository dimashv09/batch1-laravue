<?php 
$s=5;
//rumus kubus
echo "rumus kubus <br>";
$V=$s^3;
echo "$s^3 = $V";
echo "<hr>";

//rumus balok
$p=5;
$l=9;
$t=2;

echo "rumus balok <br>";
$V=$p*$l*$t;
echo "$p*$l*$t = $V";
echo "<hr>";

//rumus prisma
$b=1/2;

echo "rumus prisma <br>";
$V=$b*$p*$t*$l;
echo "$b*$p*$t*$l= $V";
echo "<hr>";

//rumus luas tabung
$phi =3.14;
$r = 7 ;

echo "rumus tabung <br>";
$V=$phi*$r^2*$t;
echo "$phi*$r^2*$t=$V";
echo "<hr>";

//rumus bola
$c=4/3;
echo "rumus bola  <br>";
echo "$phi*$r^3*$c=$V";

 ?>