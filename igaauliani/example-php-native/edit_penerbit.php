<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("connect.php");
	$id_penerbit = $_GET['id_penerbit'];

	$buku = mysqli_query($mysqli, "SELECT * FROM buku ");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit' ");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
		$email_penerbit = $penerbit_data['email'];
    	$telp_penerbit = $penerbit_data['telp'];
		$alamat_penerbit = $penerbit_data['alamat'];
    }
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
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
				<td><input type="text" name="email" value="<?php echo $email_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$nama_penerbit = $_POST['nama_penerbit'];
			$email_penerbit = $_POST['email'];
			$telp_penerbit = $_POST['telp'];
			$alamat_penerbit = $_POST['alamat'];
			
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email_penerbit', telp = '$telp_penerbit', alamat = '$alamat_penerbit'  WHERE id_penerbit = '$id_penerbit';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>