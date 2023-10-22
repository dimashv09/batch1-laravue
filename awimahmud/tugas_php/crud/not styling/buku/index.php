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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
	<center>
		<a href="index.php">Buku</a> |
		<a href="../penerbit/index.php">Penerbit</a> |
		<a href="../pengarang/index.php">Pengarang</a> |
		<a href="../katalog/index.php">Katalog</a>
		<hr>
	</center>
	
	<a href="add.php">Add New Buku</a>
	<br>
	<div class="mx-auto">
	<table class="table table-bodered table-striped" border=1>
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
		<?php
		$no = 1;
			while($data_buku = mysqli_fetch_assoc($buku)){
				echo "<tr>";

					echo "<td>".$no."</td>";
					echo "<td>".$data_buku['isbn']."</td>";
					echo "<td>".$data_buku['judul']."</td>";
					echo "<td>".$data_buku['tahun']."</td>";
					echo "<td>".$data_buku['nama_pengarang']."</td>";
					echo "<td>".$data_buku['nama_penerbit']."</td>";
					echo "<td>".$data_buku['nama_katalog']."</td>";
					echo "<td>".$data_buku['qty_stok']."</td>";
					echo "<td>".$data_buku['harga_pinjam']."</td>";
					echo "<td><a class='btn btn-primary' href='edit.php?isbn=$data_buku[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$data_buku[isbn]'>Delete</a></td></tr>";        					
				
					$no=$no+1;
			}
		?>
	</table>
	</div>
</body>
</html>