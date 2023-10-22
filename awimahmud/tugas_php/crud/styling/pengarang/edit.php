<?php
//connection
include_once('koneksi.php');
//get id
$id_pengarang = $_GET['id_pengarang'];

//query database pengarang
$pengarang = "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'";
$result = mysqli_query($koneksi, $pengarang);
$data_pengarang = mysqli_fetch_assoc($result);

$id_pengarang = $data_pengarang['id_pengarang'];
$nama_pengarang = $data_pengarang['nama_pengarang'];
$email = $data_pengarang['email'];
$telp = $data_pengarang['telp'];
$alamat = $data_pengarang['alamat'];
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
		textarea{
			margin-top:5px;
			border-radius: 5px;
			background-color:white;
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
			<form action="edit.php?id_pengarang=<?php echo $id_pengarang;?>" method='POST'>

				<!-- card body -->
				<div class="card-body m-3">

					<!-- awal row -->
					<div class="row">
						<div class="col-md-4">
							<label>ID Pengarang</label>
							<input type="text" value="<?php echo $id_pengarang?>" style="height: 35px;" class="form-control" disabled name="id_pengarang" placeholder="Disable">
						</div>
						<div class="col-md-4">
							<label>Nama Pengarang</label>
							<input type="text" value="<?php echo $nama_pengarang?>" style="height: 35px;" class="form-control" name="nama_pengarang" placeholder="Masukan nama">
						</div>
						<div class="col-md-4">
							<label>Email</label>
							<input type="text"  value="<?php echo $email?>" style="height: 35px;"  class="form-control" name="email" placeholder="Masukan email">
						</div>
						
						<div class="col-md-4">
							<label>Telepon</label>
							<input type="text" value="<?php echo $telp?>" style="height: 35px;" class="form-control" name="telp" placeholder="Masukan nomor telpon">
						</div>
						<div class="col-md-4">
							<label>Alamat</label>
							<textarea name="" id="" cols="30" rows="3" value="<?php echo $alamat?> class="form-control" name="alamat" placeholder="Masukan alamat"></textarea>
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
	include_once('koneksi.php');
	if (isset($_POST['update'])) {
		$id_pengarang = $_GET['id_pengarang'];
		$nama_pengarang = $_POST['nama_pengarang'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];


		$result = mysqli_query($koneksi, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");

		if ($result) {
			echo "Data berhasil diupdate";
		} else {
			echo "Error: " . mysqli_error($koneksi);
		}

		header('Location: index.php');
	}
	?>
</body>

</html>