<?php
include_once('connect.php');

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang ORDER BY nama_pengarang ASC");

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
		<a href="../buku/index.php">Buku</a>
		<a href="../penerbit/index.php">Penerbit</a>
		<a href="../pengarang/index.php">Pengarang</a>
		<a href="../katalog/index.php">Katalog</a>
	</center>
	<br><br>

	<a href="add.php">Tambah</a><br><br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID pengarang</th>
				<th>Nama pengarang</th>
                <th>Email</th>
				<th>Telp</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			while($data_pengarang = mysqli_fetch_assoc($pengarang)){
				echo "<tr>
					  <td>".$no++."</td>
					  <td>".$data_pengarang['id_pengarang']."</td>
					  <td>".$data_pengarang['nama_pengarang']."</td>
					  <td>".$data_pengarang['email']."</td>
					  <td>".$data_pengarang['telp']."</td>
					  <td>".$data_pengarang['alamat']."</td>
					  <td><a href='edit.php?id_pengarang=$data_pengarang[id_pengarang]' class='btn btn-primary'>Edit</a>  <a href='delete.php?id_pengarang=$data_pengarang[id_pengarang]' class='btn btn-danger'>Delete</a></td>
				
					</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>