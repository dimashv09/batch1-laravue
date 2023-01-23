<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>halaman php</title>
</head>
<body>
	<?php

	/*contoh variabel
	$nama = "awi mahmud";
	$umur = 27;

	echo "nama saya adalah $nama <br>";
	echo "umur saya adalah $umur <br>";
	?>
	*/

	//contoh aritmatika
	$a = 10;
	$b = 7;

	//penjumlahan
	$c = $a + $b;
	echo "hasil penjumlahan $a + $b = $c";
	echo '<hr>';

	//pengurangan
	$c = $a - $b;
	echo "hasil pengurangan $a - $b = $c";
	echo "<hr>";

	//perkalian
	$c = $a * $b;
	echo "hasil perkalian $a * $b = $c";
	echo '<hr>';

	//pembagian
	$c = $a + $b;
	echo "hasil pembagian $a : $b = $c";
	echo '<hr>';

	//modulus atau sisa bagi
	$c = $a % $b;
	echo "hasil sisa bagi $a % $b = $c";
	echo '<hr>';
	
	//perpangkatan
	$c = $a * $b;
	echo "hasil perpangkatan $a ** $b = $c";
	echo '<hr>';
	echo '<hr>';


	//increament(++) dan decrement(--)
	$nilai = 0;
	//simbol ++ sama dgn tambah 1
	$nilai++;
	$nilai++;
	$nilai++;
	$nilai++;
	//simbol -- sama dgn kurang 1
	$nilai--;
	$nilai--;
	$nilai--;
	echo $nilai;
	echo "<hr>";
	echo "<hr>";

	
	$a = 15;
	$b = 10;

	//operator lebih besar
	$c = $a > $b;
	echo "$a > $b : $c";
	echo '<hr>';
	
	//operator lebih kecil
	$c = $a < $b;
	echo "$a < $b :  $c";
	echo '<hr>';
	
	//operator sama dengan
	$c = $a == $b;
	echo "$a == $b :  $c";
	echo '<hr>';

	//operator tidak sama dengan 
	$c = $a != $b;
	echo "$a != $b : $c";
	echo '<hr>';
	
	//operator lebih besar sama dengan
	$c = $a >= $b;
	echo "$a >= $b :  $c";
	echo '<hr>';
	
	//operator lebih kecil sama dengan
	$c = $a <= $b;
	echo "$a <= $b : $c";
	echo '<hr>';
	echo '<hr>';


	
	
	?>
</body>
</html>