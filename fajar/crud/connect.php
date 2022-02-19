<?php

//koneksi
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

$mysqli = mysqli_connect($servername, $username, $password, $database);

if (!$mysqli) {
    die("Koneksi gagal: " . mysqli_connect_error());

}

?>