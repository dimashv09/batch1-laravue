<?php
//koneksi database
include_once('koneksi.php');
$katalog = mysqli_query($koneksi, "SELECT * FROM katalog");
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
			<form action="add.php" method="POST" name="form-add">
				
				<!-- card body -->
				<div class="card-body m-3">

					<!-- awal row -->
					<div class="col mx-auto">
						<div class="col-md-4 col-box mx-auto">
							<label>ID Katalog</label>
							<input type="text" class="form-control" name="id_katalog" placeholder="Masukan id">
						</div>
						<div class="col-md-4 col-box mx-auto">
							<label>Nama Katalog</label>
							<input type="text" class="form-control" name="nama" placeholder="Masukan nama">
						</div>
					</div>
					<!-- akhir row -->

				</div>
				<!-- akhir card body-->
				
				<!-- awal card footer -->
				<div class="card-footer">
					<div class="col-md-3 mx-auto">
						<input type="submit" class="btn btn-footer"  name="submit" value="Simpan" style="width:120px;">
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
	if(isset($_POST['submit'])){
		$id_katalog = $_POST['id_katalog'];
		$nama = $_POST['nama'];

		// include_once('koneksi.php');

		$result = mysqli_query($koneksi, "INSERT INTO katalog(id_katalog, nama) VALUES('$id_katalog', '$nama');");
		
		header('Location: index.php');
	}
	?>
</body>

</html>