<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Pengarang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php 
include_once("../buku/connect.php");
$id_pengarang = $_GET['id_pengarang'];
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang ='$id_pengarang'");

while ($pengarang_data = mysqli_fetch_array($pengarang)) {
	$nama_pengarang = $pengarang_data['nama_pengarang'];
	$email = $pengarang_data['email'];
	$telp = $pengarang_data['telp'];
	$alamat = $pengarang_data['alamat'];
}
?>
<body>
<div class="container">
	<div class="card">
		<div class="card-header">
			<a class="btn btn-primary" href="index.php">Go Home</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<form action="update.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
					<div class="form-group">
						<label>Nama Pengarang</label>
						<input class="form-control" type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email" value="<?php echo
						 $email; ?>">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input class="form-control" type="number" name="telp" value="<?php echo
						 $telp; ?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update">
					</div>
			</form>
		</div>
	</div>
</div>
</body>
<?php 

if (isset($_POST['update'])) {
	$nama_pengarang = $_POST['nama_pengarang'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];

	include_once("../buku/connect.php");

	$result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang='$nama_pengarang',email='$email',telp='$telp',alamat='$alamat';");

	header("Location:index.php");
}

 ?>
</html>