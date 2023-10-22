<?php 
include_once('koneksi.php');
$id_penerbit = $_GET['id_penerbit'];

$result = mysqli_query($koneksi, "DELETE FROM penerbit WHERE id_penerbit = '$id_penerbit'");

header('Location: index.php');
?>