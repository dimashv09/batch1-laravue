<html>

<head>
	<title>Edit Penerbit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>
</head>

<?php
	include_once("../connect.php");
	$id_penerbit = $_GET['id_penerbit'];

	$penerbit      = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email         = $penerbit_data['email'];
    	$telp          = $penerbit_data['telp'];
    	$alamat        = $penerbit_data['alamat'];
    }
?>

<body>
	<div class="container">
		<a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
		<br /><br />

		<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
			<table width="50%" border="0">
				<tr>
					<td>ID Penerbit</td>
					<td style="font-size: 11pt;"><?php echo $id_penerbit; ?> </td>
				</tr>
				<tr>
					<td>Nama Penerbit</td>
					<td><input type="text" class="form-control" name="nama_penerbit"
							value="<?php echo $nama_penerbit; ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="form-control" name="email" value="<?php echo $email; ?>"></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td><input type="number" class="form-control" name="telp" value="<?php echo $telp; ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-primary btn-sm" name="update" value="Ubah"></td>
				</tr>
			</table>
		</form>
	</div>

	<?php
		if(isset($_POST['update'])) {

			$id_penerbit   = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email         = $_POST['email'];
			$telp          = $_POST['telp'];
			$alamat        = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbit 
			SET 
			nama_penerbit = '$nama_penerbit', 
			email = '$email', 
			telp = '$telp', 
			alamat = '$alamat' 
			WHERE 
			id_penerbit = '$id_penerbit';
			");
			
			header("Location:index.php");
		}
	?>
</body>

</html>