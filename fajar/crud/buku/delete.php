<?php
require_once("../connect.php");

$isbn = $_GET['isbn'];

$delete = mysqli_query($mysqli, "DELETE FROM buku WHERE isbn='$isbn'");

header("location:index.php");

?>