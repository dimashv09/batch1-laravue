<?php
//koneksi
include_once('koneksi.php');
//get
$id_penerbit = $_GET['id_penerbit'];

//query
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'");
//kondisi untuk query data kolom
while ($data_penerbit = mysqli_fetch_array($penerbit)) {
	$id_penerbit = $data_penerbit['id_penerbit'];
	$nama_penerbit = $data_penerbit['nama_penerbit'];
	$email = $data_penerbit['email'];
	$telp = $data_penerbit['telp'];
	$alamat = $data_penerbit['alamat'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Edit Buku</title>
	<style>
		.container {
			width: 700px;
			height: 400px;
			position: relative;
		}

		.card-header {
			color: #CFE5E9;
		}

		input {
			margin: 5px 0;
		}

		select {
			margin: 5px 0;
		}

		label {
			font-weight: bold;
			font-size: 15px;
			margin-top: 5px;
			color: #F0F3F4;
		}

		.btn-new {
			background-color: #1E90FF;
			color: #FFF;
		}

		.btn-new:hover {
			background-color: #dc3545;
			color: #FFF;
		}
	</style>
</head>

<body>
	<div class="container mt-5">
		<!-- tombol back home -->
		<div class="col-md-3">

			<a href="index.php" class="btn btn-new">
				<< Back Home</a>
		</div>
		<!--awal card-->
		<div class="card bg-secondary bg-gradient text-white mt-3">

			<!-- awal card header -->
			<div class="card-header">
				<h4 class="text-center">Edit Data</h4>
			</div>
			<!-- akhir card header -->

			<!-- awal form -->
			<form action="edit.php?id_penerbit=<?php echo $id_penerbit ?>" method="POST" name="form-update">

				<!-- card body -->
				<div class="card-body">

					<!-- awal row -->
					<div class="row">
						<div class="col-md-4">
							<label>ID Penerbit</label>
							<input type="text" value="<?php echo $id_penerbit ?>" class="form-control" style="height: 35px;" name="id_penerbit" placeholder="Disable">
						</div>
						<div class="col-md-4">
							<label>Nama Penerbit</label>
							<input type="text" value="<?php echo $nama_penerbit ?>" class="form-control" style="height: 35px;" name="nama_penerbit" placeholder="Masukan nama penerbit">
						</div>
						<div class="col-md-4">
							<label>Email</label>
							<input type="text" value="<?php echo $email ?>" class="form-control" style="height: 35px;" name="email" placeholder="Masukan email">
						</div>
						<div class="col-md-4">
							<label>Telepon</label>
							<input type="text" value="<?php echo $telp ?>" class="form-control" style="height: 35px;" name="telp" placeholder="Masukan nomor telepon">
						</div>
						<div class="col-md-4">
							<label>Alamat</label>
							<textarea value="<?php echo $alamat?>" class="form-control" style="height: 35px;" name="alamat" placeholder="Masukan alamat" cols="30" rows="5"></textarea>
						</div>
					</div>
					<!-- akhir row -->

				</div>
				<!-- akhir card body-->

				<!-- awal card footer -->
				<div class="card-footer">
					<div class="col-md-3 mx-auto">
						<input type="submit" class="btn btn-danger bg-gradient fw-bold fs-5" name="update" value="Simpan" style="width:200px;">
					</div>
				</div>
				<!-- akhir card footer -->
			</form>
			<!-- akhir form -->

		</div>
		<!-- akhir card -->
	</div>
	<?php
	// include_once('koneksi.php');
	if (isset($_POST['update'])) {
		$id_penerbit = $_GET['id_penerbit'];
		$nama_penerbit = $_POST['nama_penerbit'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];

		$update = mysqli_query($koneksi, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit='$nama_penerbit', email='$email', telp='$telp', alamat='$alamat' WHERE id_penerbit='$id_penerbit'");
			header('Location:index.php');
		
	}
	?>

</body>

</html>