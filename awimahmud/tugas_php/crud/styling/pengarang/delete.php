<?php
include_once('koneksi.php');

$id_pengarang = $_GET['id_pengarang'];
// $update = mysqli_query($koneksi, "UPDATE pengarang SET id_pengarang = null where id_pengarang = $id_pengarang");
$pengarang = mysqli_query($koneksi, "DELETE FROM pengarang WHERE id_pengarang = '$id_pengarang'");
// $update = mysqli_query($koneksi, "UPDATE pengarang SET id_pengarang = 0 where id_pengarang = $id_pengarang");

?>
