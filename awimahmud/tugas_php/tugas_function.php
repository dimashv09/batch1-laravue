<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>tugas function</title>
</head>
<body>
<?php  

	//luas pesergi panjang
	function persegi_panjang($panjang, $lebar){
		$luas = ($panjang * $lebar);
		echo "luas persegi panjang = $luas";
	}
	persegi_panjang(20, 10);

	echo "<hr>";

	//luas segitiga
	function luas_segitiga($alas, $tinggi){
		$luas = 1/2 * ($alas * $tinggi);
		echo "luas segitiga = $luas";
	}
	luas_segitiga(20, 10);

	echo "<hr>";

	//luas lingkaran
	function luas_lingkaran($jari, $phie = 22/7){
		$luas = $phie * ($jari * $jari);
		echo "luas lingkaran = $luas";
	}
	luas_lingkaran(25, 22/7);
		
	echo "<hr>";

	//volume kubus
	function kubus($sisi){
		$s = $sisi;
		$volume = $s * $s * $s;
		echo "volume kubus = $volume";
	}
	kubus(10);
	
	echo "<hr>";
	
	//volume balok
	function balok($panjang, $lebar, $tinggi){
		$volume = $panjang * $lebar * $tinggi;
		echo "volume balok = $volume";
	}
	balok(30, 15, 10);
	
?>
</body>
</html>