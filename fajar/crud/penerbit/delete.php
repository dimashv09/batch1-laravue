<?php
require_once("../connect.php");

$id_penerbit = $_GET['id_penerbit'];

$delete = mysqli_query($mysqli, "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'");

header("location:index.php");

?>