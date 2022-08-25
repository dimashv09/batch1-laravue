<?php
include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
 
$isbn = $_GET['isbn'];
 
$result = mysqli_query($mysqli, "DELETE FROM buku WHERE isbn='$isbn'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>