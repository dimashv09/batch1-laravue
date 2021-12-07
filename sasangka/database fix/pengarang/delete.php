<?php
	include_once("../koneksi.php");
	
	$id = $_GET['id'];
	
	$result = mysqli_query($connect, "DELETE FROM pengarangs WHERE id='$id'");

	// After delete redirect to Home, so that latest user list will be displayed.
	header("Location:index.php");
?>