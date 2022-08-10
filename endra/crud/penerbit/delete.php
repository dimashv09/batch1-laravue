<?php

include_once("../buku/connect.php");

$id_penerbit = $_GET['id_penerbit'];

$result = mysqli_query($mysqli, "DELETE FROM penerbit where id_penerbit = '$id_penerbit'");

header("Location:index.php");
