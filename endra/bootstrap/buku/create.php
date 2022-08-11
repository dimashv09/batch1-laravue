<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
</head>

<?php
include_once("connect.php");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<a class="btn btn-outline-dark" href="index.php">Go Home</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="create.php" method="post" name="form1">
					<div class="form-group">
						<label>ISBN</label>
						<input type="text" name="isbn" class="form-control">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="date" name="tahun" class="form-control">
					</div>
					<div class="form-group">
						<label>Penerbit</label>
						<select class="custom-select" name="id_penerbit">
							<?php
							while ($penerbit_data =
								mysqli_fetch_array($penerbit)
							) {
								echo "<option value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Pengarang</label>
						<select class="custom-select" name="id_pengarang">
							<?php
							while ($pengarang_data = mysqli_fetch_array($pengarang)) {

								echo "<option value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Katalog</label>
						<select class="custom-select" name="id_katalog">
							<?php
							while ($katalog_data = mysqli_fetch_array($katalog)) {
								echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
							}

							?>
						</select>
					</div>

					<div class="form-group">
						<label>Qty Stok</label>
						<input type="text" name="qty_stok" class="form-control">
					</div>
					<div>
						<label>Harga Pinjam</label>
						<input type="text" name="harga_pinjam" class="form-control">
					</div>
					<div class="form-group mt-3">
						<input class="btn btn-info" type="submit" name="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['Submit'])) {
		$isbn = $_POST['isbn'];
		$judul = $_POST['judul'];
		$tahun = $_POST['tahun'];
		$id_penerbit = $_POST['id_penerbit'];
		$id_pengarang = $_POST['id_pengarang'];
		$id_katalog = $_POST['id_katalog'];
		$qty_stok = $_POST['qty_stok'];
		$harga_pinjam = $_POST['harga_pinjam'];

		include_once("connect.php");

		$result = mysqli_query($mysqli, "INSERT INTO buku (isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");

		header("Location:index.php");
	}

	?>
</body>

</html>