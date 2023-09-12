<?php
include_once('../connect.php');

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog ORDER BY nama ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Homepage</title>
</head>
<body>
	<center>
		<a href="../buku/index.php">Buku</a> |
		<a href="../katalog/index.php">Katalog</a> |
		<a href="../penerbit/index.php">Penerbit</a> |
		<a href="../pengarang/index.php">Pengarang</a> 
        <hr>
	</center>
	<br><br>

	<a href="add.php">Tambah</a><br><br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Katalog</th>
				<th>Nama Katalog</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			while($katalog_data = mysqli_fetch_assoc($katalog)){
				echo "<tr>
					  <td>".$no++."</td>
					  <td>".$katalog_data['id_katalog']."</td>
					  <td>".$katalog_data['nama']."</td>
					  <td><a href='edit.php?id_katalog=$katalog_data[id_katalog]' class='btn btn-primary'>Edit</a>  <a href='delete.php?id_katalog=$katalog_data[id_katalog]' class='btn btn-danger'>Delete</a></td>
				
					</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>