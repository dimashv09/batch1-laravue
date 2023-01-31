<?php
$servername = 'localhost';
$database = 'perpus';
$username = 'root';
$password = '';

$koneksi = mysqli_connect($servername, $username, $password);
mysqli_select_db($koneksi, $database);
if($koneksi == false){
	echo "gagal";
}else{
	// echo "berhasil";
}

?>