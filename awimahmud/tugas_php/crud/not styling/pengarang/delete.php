<?php
include_once('koneksi.php');

$id_pengarang = $_GET['id_pengarang'];

$pengarang = mysqli_query($koneksi, "DELETE FROM pengarang WHERE id_pengarang = '$id_pengarang'");

header('Location: index.php');
?>