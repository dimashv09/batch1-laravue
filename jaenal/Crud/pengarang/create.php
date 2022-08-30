<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Pengarang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="card">
		<div class="card-header">
			<a class="btn btn-primary" href="index.php">Go Home</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<form action="create.php" method="post" name="form1">
				<table>
					<div class="form-group">
						<label>Nama Pengarang</label>
						<input class="form-control" type="text" name="nama_pengarang">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input class="form-control" type="number" name="telp">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" type="text" name="alamat">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="Submit">
					</div>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
<?php 

if (isset($_POST['Submit'])) {
	$nama_pengarang = $_POST['nama_pengarang'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];

	include_once("../buku/connect.php");

	$result = mysqli_query($mysqli, "INSERT INTO pengarang (nama_pengarang,email,telp,alamat) VALUES ('$nama_pengarang','$email','$telp','$alamat');");

	header("Location:index.php");
}

 ?>
</html>