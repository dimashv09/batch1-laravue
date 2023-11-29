<html>
<head>
	<title>Add penerbit</title>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="add_penerbit.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>id penerbit</td>
				<td><input type="text" name="id_penerbit"></td>
			</tr>
			<tr> 
				<td>nama</td>
				<td><input type="text" name="nama_penerbit"></td>
			</tr>
			<tr> 
				<td>email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="alamat"></td>
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
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email_penerbit = $_POST['email'];
			$telp_penerbit = $_POST['telp'];
			$alamat_penerbit = $_POST['alamat'];
		
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email_penerbit', '$telp_penerbit', '$alamat_penerbit');");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>