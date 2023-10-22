<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

// buat koneksi
$koneksi = mysqli_connect($servername, $username, $password);
//cek koneksi
if($koneksi){
	$db = mysqli_select_db($koneksi, $database);
	//echo "database terhubung";
	if(!$db){
		echo "database gagal terhubung";
	}
} else{
		echo "koneksi tidak terhubung";
	}
?>
