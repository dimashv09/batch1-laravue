<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
		include_once("../connect.php");

		$id_pengarang = $_GET['id_pengarang'];

		$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

		while ($data = mysqli_fetch_array($pengarang)) 
		{
    		# code...
    		$id_pengarang = $data['id_pengarang'];
    		$nama_pengarang = $data['nama_pengarang'];
    		$email = $data['email'];
    		$telp = $data['telp'];
    		$alamat = $data['alamat'];
		}
?>
<body>
	<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID Pengarang</td>
				<td style="font-size: 11pt;"><?php echo $id_pengarang; ?> </td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>No Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if (isset($_POST['update'])) {
    		# code...
    		$id_pengarang = $_GET['id_pengarang'];
    		$nama_pengarang = $_POST['nama_pengarang'];
    		$email = $_POST['email'];
    		$telp = $_POST['telp'];
    		$alamat = $_POST['alamat'];
			
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "UPDATE pengarang SET id_pengarang = '$id_pengarang', nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang';");
			
			header("Location:index.php");
		}
	?>

</body>
</html>
