<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bangun Ruang</title>
</head>
<body>
	<h1>3 Jenis Volume Bangun Ruang</h1>

<?php
	//volume kubus
	$sisi = 10;
	$s = $sisi;
	$volume = $s * $s * $s;
	echo "volume kubus = $volume";

	echo "<hr>";

	//volume balok
	$p = 30; //panjang
	$l = 15; //lebar
	$t = 10; //tinggi
	$a = $p*$l*$t;
	echo "volume balok = $a";

	echo "<hr>";

	//volume bola
	$phi = 3.14; 
	$r = 5; //jari-jari
	$volume = (4/3)*$phi*$r*$r*$r;
	echo "volume bola = $volume";

?>
</body>
</html>