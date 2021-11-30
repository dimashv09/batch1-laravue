<?php
$server   = "localhost";
error_reporting(E_ERROR | E_PARSE);
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
  echo "Berhasil";
}


//TAMPILKAN DATABASE
$sql = "SELECT * FROM bukus";
$result = $connect->query($sql);

// check result
if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        echo '<h1>' . $i++ . '.buku : ' . $row['judul'] . 'telah di rilis di tahun : ' . $row['tahun'] . '<br></h1>';
    }
} else {
    echo "0 results";
}