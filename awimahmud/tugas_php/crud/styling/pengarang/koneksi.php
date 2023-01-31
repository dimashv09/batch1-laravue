<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = '';

$koneksi = mysqli_connect($servername, $username, $password, $database);
//mysqli_select_db($koneksi, $database);
if(!$koneksi){
	die('koneksi gagal');
}

$id_pengarang = "";
$nama_pengarang = "";
$email = "";
$telp = "";
$alamat = "";
$judul = "";
$tahun = "";
?>