<?php
include_once('connect.php');
$buku = mysqli_query($koneksi, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
								LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
								LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
								LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
								ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.google.com/specimen/Poppins" />
	<style>
		.navbar {
			font-family: Georgia, 'Times New Roman', Times, serif;
			background-color: #45B39D;
			position:relative;
			width: 100%;
		}

		.thead {
			font-family: Georgia, 'Times New Roman', Times, serif;	
			background-color: #45B39D;
			
		}
		tbody{
			font-size: small;
		}

		.nav-item {
			margin-right: 50px;
			display: block;
		}

		.nav-item:hover {
			transition: all 0.5s cubic-bezier(0.815, 0.005, 0.18, 1.005);
			border-radius: 10px;
			color:  #dc3545;
			font-weight: bold;
		}

		.navbar-brand:hover {
			color: #dc3545;
			transition: all 0.5s cubic-bezier(0.815, 0.005, 0.18, 1.005);
		}

		.btn-aksi {
			margin-right: 5px;
		}
		.footer{
			background-color: #dc3545;
			box-sizing: border-box;
		}
	</style>
</head>

<body>
	<!-- awal navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark mb-5 px-5">
		<a class="navbar-brand fw-bold " href="index.php"><span class="text-danger span">AWI</span> PERPUS</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ms-auto">
				<a class="nav-item nav-link active" href="">Buku</a>
				<a class="nav-item nav-link" href="../penerbit/index.php">Penerbit</a>
				<a class="nav-item nav-link" href="../pengarang/index.php">Pengarang</a>
				<a class="nav-item nav-link" href="../katalog/index.php">Katalog</a>
			</div>
		</div>
	</nav>
	<!-- akhir navbar -->

	<div class="container">
	<!-- button-->
	<div class="bg-light p-1 pt-2">
		<a class="btn btn-primary mb-1  text-white " href="add2.php" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-square-fill mb-1" viewBox="0 0 16 16">
				<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
			</svg> Tambah</a>
	</div>
		<div class="row">
			<!-- awal tabel -->
			<div class="table-responsive">
				<table class="table table-bordered border-light table-striped table-hover text-center">
					<thead class="thead">
						<tr>
							<th>No</th>
							<th>ISBN</th>
							<th>Judul</th>
							<th>Tahun</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>Katalog</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($data_buku = mysqli_fetch_assoc($buku)) {
							echo "<tr>";
							echo "<td>" . $no . "</td>";
							echo "<td>" . $data_buku['isbn'] . "</td>";
							echo "<td>" . $data_buku['judul'] . "</td>";
							echo "<td>" . $data_buku['tahun'] . "</td>";
							echo "<td>" . $data_buku['nama_pengarang'] . "</td>";
							echo "<td>" . $data_buku['nama_penerbit'] . "</td>";
							echo "<td>" . $data_buku['nama_katalog'] . "</td>";
							echo "<td>" . $data_buku['qty_stok'] . "</td>";
							echo "<td>" . $data_buku['harga_pinjam'] . "</td>";
							echo "<td><a class='btn btn-warning btn-aksi' href='edit.php?isbn=$data_buku[isbn]'> Edit</a>  <a class='btn btn-danger btn-aksi' href='delete.php?isbn=$data_buku[isbn]'>Delete</a></td></tr>";
							$no = $no + 1;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<footer class="bg-dark text-center text-white mt-5" style="height:100px;">
  <!-- Copyright -->
 	 <div class="text-center p-4 pt-5 mt-5" style="background-color: rgba(0, 0, 0, 0.2);">
   		 © 2023 Copyright: <a class="text-white" href="index.php">Awi Mahmud</a>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>