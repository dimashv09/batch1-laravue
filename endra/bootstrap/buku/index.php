<?php

include_once("connect.php");
$buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang,nama_penerbit, katalog.nama as nama_katalog from buku LEFT JOIN pengarang ON pengarang.id_pengarang=buku.id_pengarang LEFT JOIN penerbit ON penerbit.id_penerbit=buku.id_penerbit LEFT JOIN katalog ON katalog.id_katalog=buku.id_katalog ORDER BY judul ASC");

?>


<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<center>
					<a href="../buku/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Buku</strong></mark></abbr></a>
					<a href="../penerbit/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Penerbit</strong></mark></abbr></a>
					<a href="../pengarang/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Pengarang</strong></mark></abbr></a>
					<a href="../katalog/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Katalog</strong></mark></abbr></a>
					<hr>
				</center>

				<a class="btn btn-outline-success" href="create.php">Add New Buku</a><br><br>

				<table class="table" border="2">
					<tr class="table-success">
						<th>ISBN</th>
						<th>Judul</th>
						<th>Tahun</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Katalog</th>
						<th>Stok</th>
						<th>Harga Pinjam</th>
						<th>Aksi</th>
					</tr>
					<?php
					while ($buku_data = mysqli_fetch_array($buku)) {
						echo "<tr>";
						echo "<td >" . $buku_data['isbn'] . "</td>";
						echo "<td>" . $buku_data['judul'] . "</td>";
						echo "<td>" . $buku_data['tahun'] . "</td>";
						echo "<td>" . $buku_data['nama_pengarang'] . "</td>";
						echo "<td>" . $buku_data['nama_penerbit'] . "</td>";
						echo "<td>" . $buku_data['nama_katalog'] . "</td>";
						echo "<td>" . $buku_data['qty_stok'] . "</td>";
						echo "<td>" . $buku_data['harga_pinjam'] . "</td>";
						echo "<td><a class='btn btn-info btn-sm'  href='update.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-warning btn-sm' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";
					}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

</html>