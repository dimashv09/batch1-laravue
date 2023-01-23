<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=, initial-scale=1.0">
	<title>Bangun Datar</title>
</head>
<body>
	<h1>5 Jenis Luas Bangun Datar</h1>
	<?php 
		//luas pesergi panjang
		$panjang = 20;
		$lebar = 10;
		$luas = ($panjang * $lebar);
		echo "luas persegi panjang = $luas";

		echo "<hr>";

		//luas segitiga
		$alas = 20;
		$tinggi = 10;
		$luas = 1/2 * ($alas * $tinggi);
		echo "luas segitiga = $luas";

		echo "<hr>";

		//luas lingkaran
		$jari = 25;
		$phie = 22/7;
		$luas = $phie;
		$luas_lingkaran = $luas * ($jari * $jari);
		echo "luas lingkaran = $luas_lingkaran";

		echo "<hr>";

		//luas trapesium
		$sisi1 = 10;
		$sisi2 = 8;
		$sisi3 = 5;
		$luas = (($sisi1+$sisi2+$sisi3)/2);
		echo "luas trapesium = $luas";

		echo "<hr>";

		//luas layang-layang
		$diagonal_1 = 5;
		$diagonal_2 = 8;
		$luas = 0.5*$diagonal_1*$diagonal_2;
		echo "luas layang-layang = $luas";
	?>
</body>
</html>