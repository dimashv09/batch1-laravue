<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
		include_once("../connect.php");

		$id_penerbit = $_GET['id_penerbit'];

		$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

		while ($data = mysqli_fetch_array($penerbit)) 
		{
    		# code...
    		$id_penerbit = $data['id_penerbit'];
    		$nama_penerbit = $data['nama_penerbit'];
    		$email = $data['email'];
    		$telp = $data['telp'];
    		$alamat = $data['alamat'];
		}
?>
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID Penerbit</td>
				<td style="font-size: 11pt;"><?php echo $id_penerbit; ?> </td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
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
    		$id_penerbit = $_GET['id_penerbit'];
    		$nama_penerbit = $_POST['nama_penerbit'];
    		$email = $_POST['email'];
    		$telp = $_POST['telp'];
    		$alamat = $_POST['alamat'];
			
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:index.php");
		}
	?>

</body>
</html>
