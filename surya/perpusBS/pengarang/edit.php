<html>

<head>
	<title>Edit Pengarang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>
</head>

<?php
	include_once("../connect.php");
	$id_pengarang = $_GET['id_pengarang'];

	$pengarang      = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
    	$nama_pengarang = $pengarang_data['nama_pengarang'];
    	$email          = $pengarang_data['email'];
    	$telp           = $pengarang_data['telp'];
    	$alamat         = $pengarang_data['alamat'];
    }
?>

<body>
	<div class="container">
		<a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
		<br /><br />

		<form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
			<table width="50%" border="0">
				<tr>
					<td>ID Pengarang</td>
					<td style="font-size: 11pt;"><?php echo $id_pengarang; ?> </td>
				</tr>
				<tr>
					<td>Nama Pengarang</td>
					<td><input type="text" class="form-control" name="nama_pengarang"
							value="<?php echo $nama_pengarang; ?>">
					</td>
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

			$id_pengarang   = $_GET['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email          = $_POST['email'];
			$telp           = $_POST['telp'];
			$alamat         = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE pengarang 
			SET 
			nama_pengarang = '$nama_pengarang', 
			email = '$email', 
			telp = '$telp', 
			alamat = '$alamat' 
			WHERE 
			id_pengarang = '$id_pengarang';
			");
			
			header("Location:index.php");
		}
	?>
</body>

</html>