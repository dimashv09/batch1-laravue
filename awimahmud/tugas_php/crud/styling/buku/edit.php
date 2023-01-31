<?php
//mengambil database
include_once("connect.php");
//mengambil data buku berdasarkan idnya yaitu isbn dan tampilkan
$isbn = $_GET['isbn'];

//query menampilkan isi database
$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE isbn = '$isbn'");
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
$katalog = mysqli_query($koneksi, "SELECT * FROM katalog");

//buat kondisi untuk query data lebih spesifik
while ($data_buku = mysqli_fetch_array($buku)) {
	$judul = $data_buku['judul'];
	$isbn = $data_buku['isbn'];
	$tahun = $data_buku['tahun'];
	$id_penerbit = $data_buku['id_penerbit'];
	$id_pengarang = $data_buku['id_pengarang'];
	$id_katalog = $data_buku['id_katalog'];
	$qty_stok = $data_buku['qty_stok'];
	$harga_pinjam = $data_buku['harga_pinjam'];
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
		.card-header{
			color:#CFE5E9;
		}

		input {
			margin: 5px 0;
		}
		select {
			margin: 5px 0;
		}

		label{
			font-weight: bold;
			font-size: 15px;
			margin-top:5px;
			color: #F0F3F4;
		}
		.btn-new{
			background-color: #1E90FF;
			color: #FFF;
		}
		.btn-new:hover{
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
			<form action="edit.php?isbn=<?php echo $isbn ?>" method="POST" name="form-update">

				<!-- card body -->
				<div class="card-body">

					<!-- awal row -->
					<div class="row">
						<div class="col-md-4">
							<label>ISBN</label>
							<input type="text" value="<?php echo $isbn ?>" style="height: 35px;" class="form-control" disabled name="isbn" placeholder="Disable">
						</div>
						<div class="col-md-4">
							<label>Judul</label>
							<input type="text" value="<?php echo $judul ?>"  style="height: 35px;" class="form-control" name="judul" placeholder="Masukan judul">
						</div>
						<div class="col-md-4">
							<label>Tahun</label>
							<input type="text" value="<?php echo $tahun ?>"  style="height: 35px;" class="form-control" name="tahun" placeholder="Masukan tahun">
						</div>
						<div class="col-md-4">
							<label>Penerbit</label>
							<select class="form-select"  style="height: 35px;" name="id_penerbit" style="color: black;">
								<?php
								while ($penerbit_data = mysqli_fetch_array($penerbit)) {
									echo "<option " . ($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '') . " value = '" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Pengarang</label>
							<select class="form-select"  style="height: 35px;" name="id_pengarang" style="color: black;">
								<?php
								while ($pengarang_data = mysqli_fetch_array($pengarang)) {
									echo "<option " . ($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '') . " value = '" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Katalog</label>
							<select class="form-select"  style="height: 35px;" name="id_katalog" style="color:black;">
								<?php
								while ($katalog_data = mysqli_fetch_array($katalog)) {
									echo "<option " . ($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '') . " value = '" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Qty</label>
							<input type="text"  style="height: 35px;" value="<?php echo $qty_stok ?>" class="form-control" name="qty_stok" placeholder="Masukan qty stok">
						</div>
						<div class="col-md-4">
							<label>Harga Pinjam</label>
							<input type="text"  style="height: 35px;" value="<?php echo $harga_pinjam ?>" class="form-control" name="harga_pinjam" placeholder="Masukan harga">
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