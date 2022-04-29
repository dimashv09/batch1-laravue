<?php 

include_once("../buku/connect.php");

$id_pengarang = $_GET['id_pengarang'];

$result = mysqli_query($mysqli, "DELETE FROM pengarang WHERE id_pengarang ='$id_pengarang'");

header("Location:index.php");
 ?>