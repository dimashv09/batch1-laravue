<?php
error_reporting(E_ERROR | E_PARSE);

$server   = "localhost";
$username = "root";
$password = "";
$database ="perpustakaan";

//Create coneksi ke server
$connect= mysqli_connect($server,$username,$password, $database);

//Chekk koneksi ke server
if (mysqli_connect_errno()) {
  echo "Gagal";
  exit();
}else{
  echo "berhasil terhubung";
}
