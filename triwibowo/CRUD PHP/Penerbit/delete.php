<?php
include_once("connect.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM penerbits WHERE id='$id'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>