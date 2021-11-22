<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$mysqli = mysqli_connect($servername, $username, $password, $database);
if (!$mysqli) {
	die("Connection Failed: " . mysqli_connect_error());
}
?>