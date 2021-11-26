<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("connect.php");

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalogs` (`nama`) VALUES ('$nama');");
			
			header("Location:index.php");
		}
	?>
</body>
</html>