<?php
include_once('koneksi.php');

$id_katalog = $_GET['id_katalog'];

$katalog = mysqli_query($koneksi, "DELETE FROM katalog WHERE id_katalog ='$id_katalog'");

header('Location: index.php');
?>