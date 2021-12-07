<?php
	include_once("../koneksi.php");
	
	$isbn = $_GET['isbn'];
	
	$result = mysqli_query($mysqli, "DELETE FROM bukus WHERE isbn='$isbn'");

	// After delete redirect to Home, so that latest user list will be displayed.
	header("Location:index.php");
?>