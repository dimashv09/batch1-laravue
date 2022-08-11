<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Katalog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php
include_once("../buku/connect.php");
$id_katalog = $_GET['id_katalog'];
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");

while ($katalog_data = mysqli_fetch_array($katalog)) {
	$nama = $katalog_data['nama'];
}

?>

<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<a class="btn btn-outline-secondary" href="index.php">Go Home</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="update.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>">
					</div>
					<div class="form-group">
						<input class="btn btn-warning" type="submit" name="update" value="Update">
					</div>
				</form>
</body>
<?php

if (isset($_POST['update'])) {
	$nama = $_POST['nama'];

	include_once("../buku/connect.php");

	$result = mysqli_query($mysqli, "UPDATE katalog SET nama='$nama' WHERE id_katalog ='$id_katalog';");
	header("Location:index.php");
}

?>

</html>