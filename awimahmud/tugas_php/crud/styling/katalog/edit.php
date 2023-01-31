<?php
include_once('koneksi.php');

if (isset($_POST['update'])) {
	$id_katalog = $_GET['id_katalog'];
	$nama = $_POST['nama'];

	$result = mysqli_query($koneksi, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'");

	header('Location: index.php');
}

$id_katalog = $_GET['id_katalog'];
$katalog = mysqli_query($koneksi, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");
$data = mysqli_fetch_assoc($katalog);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Edit Data Pengarang</title>
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
			<form action="edit.php?id_katalog=<?php echo $id_katalog ?>" method="POST" name="form-update">

				<!-- card body -->
				<div class="card-body">

					<!-- awal row -->
					<div class="col mx-auto">
						<div class="col-md-4 col-box mx-auto">
							<label>ID Katalog</label>
							<input type="text" value="<?php echo $id_katalog ?>" style="height: 35px;" class="form-control" disabled name="id_katalog" placeholder="Disable">
						</div>
						<div class="col-md-4 col-box mx-auto">
							<label>Nama Katalog</label>
							<input type="text" value="<?php echo $data['nama'] ?>" style="height: 35px;" class="form-control" name="nama" placeholder="Masukan nama">
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
	// ob_start();
	// Check if form is submitted for buku update, then redirect to homepage after update
	if (isset($_POST['update'])) {
		$isbn = $_GET['isbn'];
		$judul = $_POST['judul'];
		$tahun = $_POST['tahun'];
		$id_penerbit = $_POST['id_penerbit'];
		$id_pengarang = $_POST['id_pengarang'];
		$id_katalog = $_POST['id_katalog'];
		$qty_stok = $_POST['qty_stok'];
		$harga_pinjam = $_POST['harga_pinjam'];

		//koneksikan file database
		include_once('connect.php');

		$result = mysqli_query($koneksi, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'");


		//Redirect to homepage to display updated user in list
		header("location: index.php");
	}
	?>
</body>

</html>