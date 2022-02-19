<?php
require_once("../connect.php");

$id = $_GET['id_pengarang'];

$delete = mysqli_query($mysqli, "DELETE FROM pengarang WHERE id_pengarang='$id'");

header("Location:index.php");

?>