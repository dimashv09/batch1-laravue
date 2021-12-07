<?php
include_once("../koneksi.php");
$buku = mysqli_query($connect, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama AS nama_katalog FROM bukus
			LEFT JOIN penerbits ON penerbits.id = bukus.id_penerbit 
			LEFT JOIN pengarangs ON pengarangs.id = bukus.id_pengarang 
			LEFT JOIN katalogs ON katalogs.id = bukus.id_katalog
			ORDER BY judul ASC");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<br>
		<br>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<br>
		<br>
		<title>Buku</title>
	</head>
	<style>
		 @import url('../style.css');
	<body>
		<div class="container">
			<div class="navigation">
			<a href="../buku/index.php" class="navigation__link">Buku</a>
			<a href="../penerbit/index.php" class="navigation__link">Penerbit</a>
			<a href="../pengarang/index.php" class="navigation__link">Pengarang</a>
			<a href="../katalog/index.php" class="navigation__link">Katalog</a>
		</div>
			<a href="add.php" class="addb button">Add Data</a><br/><br/>
			<h3 class="page__title">List Buku</h3>
			<table class="table__data" width="80% border=2">
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