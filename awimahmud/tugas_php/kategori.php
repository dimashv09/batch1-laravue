<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>kategori</title>
</head>
<body>
	
<?php
	$nama = "awi mahmud";
	$berat_badan = 60;
	$tinggi_badan = 1.68;
	$bb = $berat_badan;
	$tb = $tinggi_badan;
	$bmi = $bb/($tb*$tb);

	if($bmi < 18.5 ){
		echo "Halo, $nama nilai BMI anda adalah $bmi anda termasuk kurus";
	}elseif($bmi >= 18.5 && $bmi <= 24.9){
		echo "Halo, $nama nilai BMI anda adalah $bmi anda termasuk sedang";
	}
	else{
		echo "Halo, $nama nilai BMI anda adalah $bmi anda termasuk gemuk";
	}

?>	
</body>
</html>