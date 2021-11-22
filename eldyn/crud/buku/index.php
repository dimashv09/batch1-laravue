<?php
include_once("connect.php");
$buku = mysqli_query($mysqli, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama AS nama_katalog FROM bukus
			LEFT JOIN penerbits ON penerbits.id = bukus.id_penerbit 
			LEFT JOIN pengarangs ON pengarangs.id = bukus.id_pengarang 
			LEFT JOIN katalogs ON katalogs.id = bukus.id_katalog
			ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Table</title>
	</head>
	<style>
		@import url('../styles.css');
	</style>
	<body>
		<div class="container">
			<div class="navigation">
			<a href="../buku/index.php" class="navigation__link">Buku</a>
			<a href="../penerbit/index.php" class="navigation__link">Penerbit</a>
			<a href="../pengarang/index.php" class="navigation__link">Pengarang</a>
			<a href="../katalog/index.php" class="navigation__link">Katalog</a>
		</div>
			<a href="add.php" class="addb button">Add Data</a>
			<h3 class="page__title">List Buku</h3>
			<table class="table__data">
				<thead>
					<tr>
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
				</thead>
				<tbody>
				<?php
					while($buku_data = mysqli_fetch_array($buku)) {
						echo "<tr class='row_table'>";
						echo "<td>".$buku_data["isbn"]."</td>";
						echo "<td>".$buku_data["judul"]."</td>";
						echo "<td>".$buku_data["tahun"]."</td>";
						echo "<td>".$buku_data["nama_pengarang"]."</td>";
						echo "<td>".$buku_data["nama_penerbit"]."</td>";
						echo "<td>".$buku_data["nama_katalog"]."</td>";
						echo "<td>".$buku_data["qty_stok"]."</td>";
						echo "<td>".$buku_data["harga_pinjam"]."</td>";
						echo "<td>"."<a href='edit.php?isbn=$buku_data[isbn]' class='editb button'>Edit</a>".
						"<a href='delete.php?isbn=$buku_data[isbn]' class='deleteb button'>Delete</a>"."</td>";
						echo "<tr>";
					}
				?>
				</tbody>
			</table>
		</div>
	</body>
</html>