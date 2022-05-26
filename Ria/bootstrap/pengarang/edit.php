<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
		include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

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
	<div class="card-body">
	<a type="button" class="btn btn-outline-primary" href="index.php">Go to Home</a>
	<br/><br/>
 	</div>

 	<div class="card">
		<div class="card-body">
			<div class="card-header">

	<form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<table width="25%" border="0">
			<div class="form-group">
			<tr> 
				<td>ID Pengarang</td>
				<td class="form-control" style="font-size: 11pt;"><?php echo $id_pengarang; ?> </td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input class="form-control" type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
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