<?php
	include_once("../connect.php");
	$katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Katalog</title>
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
			<h3 class="page__title">List Katalog</h3>
			<table class="table__data">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$index = 0;
					while($katalog_data = mysqli_fetch_array($katalog)) {
						$index = $index + 1;
						echo "<tr class='row_table'>";
						echo "<td>".$index."</td>";
						echo "<td>".$katalog_data["nama"]."</td>";
						echo "<td>"."<a href='edit.php?id=$katalog_data[id]' class='editb button'>Edit</a>".
						"<a href='delete.php?id=$katalog_data[id]' class='deleteb button'>Delete</a>"."</td>";
						echo "<tr>";
					}
				?>
				</tbody>
			</table>
		</div>
	</body>
</html>