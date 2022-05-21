<?php

// Ketik kode untuk swap 2 integer variables tanpa VARIABLE TAMBAHAN 
// Contoh : let a = 3, let b = 7 => hasilnya a = 7, b = 3


$a = 3;
$b = 7;



$a = $a+$b; //3+7 =10    #a=10
$b = $a-$b; //10-7 =3    #b=3
$a = $a-$b; //10-3=7     #a=7

echo "a = $a <br>";
echo "b = $b";