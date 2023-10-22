<?php
include_once('connect.php');
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
$katalog = mysqli_query($koneksi, "SELECT * FROM katalog");
ob_start() 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Add Buku</title>
	<style>
		.container{
			width: 700px;
			height: 400px;
			position:relative;
		}
		.card-header{
			font-family:Georgia, 'Times New Roman';;
			background-color:#45B39D;
		}
		input{
			 margin: 5px 0;
		}
		select{
			margin:5px 0;
		}
		label{
			font-weight: bold;
			font-size: 15px;
			margin-top:5px;
			color: #2F4F4F;
		}
		.card{
			background-color:#FFF;
			
		}
		.card-footer{
			background-color: #45B39D;
		}
		.btn-footer{
			color:white;
			background-color: #dc3545;
		}
		.btn-footer:hover{
			color:white;
			background-color:#1E90FF;
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

			<a href="index.php" class="btn btn-new"><< Back Home </a>
		</div>
		<!--awal card-->
		<div class="card text-white mt-3">

			<!-- awal card header -->
			<div class="card-header">
				<h4 class="text-center">Input Data Baru</h4>
			</div>
			<!-- akhir card header -->

			<!-- awal form -->
			<form action="add2.php" method="POST" name="form-add">

				<!-- card body -->
				<div class="card-body m-3">

					<!-- awal row -->
					<div class="row">
						<div class="col-md-4">
							<label>ISBN</label>
							<input type="text" class="form-control" name="isbn" placeholder="Masukan Id penerbit">
						</div>
						<div class="col-md-4">
							<label>Judul</label>
							<input type="text" class="form-control" name="judul" placeholder="Masukan nama penerbit">
						</div>
						<div class="col-md-4">
							<label>Tahun</label>
							<input type="text" class="form-control" name="tahun" placeholder="Masukan email">
						</div>
	
						<div class="col-md-4">
							<label>Penerbit</label>
							<select name="id_penerbit" id="" class="form-control">
								<?php 
									while($data_penerbit = mysqli_fetch_assoc($penerbit)){
									echo "<option value='".$data_penerbit['id_penerbit']."'>".$data_penerbit['id_penerbit']."</option>";
									}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Pengarang</label>
							<select name="id_pengarang" id="" class="form-control">
								<?php 
									while($data_pengrarang = mysqli_fetch_assoc($pengarang)){
									echo "<option value='".$data_pengarang['id_pengarang']."'>".$data_pengarang['id_pengarang']."</option>";
									}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Katalog</label>
							<select name="id_katalog" style="color: black;">
								<?php
								while ($katalog_data = mysqli_fetch_assoc($katalog)) {
									echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<label>Qty Stok</label>
							<input type="text" class="form-control" name="qty_stok" placeholder="Masukan qty stok">
						</div>
						<div class="col-md-4">
							<label>Harga Pinjam</label>
							<input type="text" class="form-control" name="harga_pinjam" placeholder="Masukan harga pinjam">
						</div>
					</div>
					<!-- akhir row -->

				</div>
				<!-- akhir card body-->

				<!-- awal card footer -->
				<div class="card-footer">
					<div class="col-md-3 mx-auto">
						<input type="submit" class="btn btn-footer" name="submit" value="Simpan" style="width:120px;">
					</div>
				</div>
				<!-- akhir card footer -->
			</form>
			<!-- akhir form -->

		</div>
		<!-- akhir card -->
	</div>
<?php
include_once('connect.php');
if(isset($_POST['submit'])) {
	$isbn = $_POST['isbn'];
	$judul = $_POST['judul'];
	$tahun = $_POST['tahun'];
	$id_penerbit = $_POST['id_penerbit'];
	$id_pengarang = $_POST['id_pengarang'];
	$id_katalog = $_POST['id_katalog'];
	$qty_stok = $_POST['qty_stok'];
	$harga_pinjam = $_POST['harga_pinjam'];

	//masukan data buku kedalam tabel
	$result = mysqli_query($koneksi, "INSERT INTO buku(isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam)
									 VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
    if ($result) {
        header('location: index.php');
    } else {
        echo "Gagal menambahkan data";
    }
}
?>
</body>

</html>