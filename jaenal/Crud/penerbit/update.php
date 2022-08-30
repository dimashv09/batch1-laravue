<!DOCTYPE html>
<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php 

include_once("../buku/connect.php");
$id_penerbit = $_GET['id_penerbit'];

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");



while ($penerbit_data = mysqli_fetch_array($penerbit)) {
	$nama_penerbit = $penerbit_data['nama_penerbit'];
	$email = $penerbit_data['email'];
	$telp = $penerbit_data['telp'];
	$alamat = $penerbit_data['alamat'];
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
			<form action="update.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
				<table width="25%" border="0">
					<div class="form-group">
						<label>Nama Penerbit</label>
						<input class="form-control" type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<label>Nomor Telepon</label>
						<input class="form-control" type="number" name="telp" value="<?php echo $telp; ?>">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update">
					</div>
				</table>
			</form>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['update'])) {
	$nama_penerbit = $_POST['nama_penerbit'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];

	include_once("../buku/connect.php");

	$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit='$nama_penerbit', email='$email',telp='$telp',alamat='$alamat' WHERE id_penerbit = '$id_penerbit';");

	header("Location:index.php");
}

 ?>
</body>
</html>