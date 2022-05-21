<?php
require_once("../connect.php");

$id_katalog = $_GET['id_katalog'];

$delete = mysqli_query($mysqli, "DELETE FROM katalog WHERE id_katalog='$id_katalog'");

header("location:index.php");

?>