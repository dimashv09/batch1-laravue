<html>
<head>
	
	<title>Add Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
	<div class="card-body">
	<a type="button" class="btn btn-outline-primary" href="index.php">Go to Home</a>
	<br/><br/>
 	</div>

 	<div class="card">
		<div class="card-body">
			<div class="card-header">

	<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">
			<div class="form-group">
			<tr> 
				<td>ID Penerbit</td>
				<td class="form-control" style="font-size: 11pt;"><?php echo $id_penerbit; ?> </td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input class="form-control" type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Email</td>
				<td><input class="form-control" type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>No Telepon</td>
				<td><input class="form-control" type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Alamat</td>
				<td><input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			</div>
			<tr> 
				<td></td>
				<td><class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	</div>
		</div>
			</div>
	
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
