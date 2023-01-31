<?php
include_once('koneksi.php');
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<center>
			<a href="../buku/index.php">Buku</a>
			<a href="../penerbit/index.php">Penerbit</a>
			<a href="index.php">Pengarang</a>
			<a href="../katalog/index.php">Katalog</a>
		</center>
	</header>
	<div>
		<a href="add.php">Tambah Data</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Id Pengarang</th>
				<th>Nama Pengarang</th>
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
				echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$data_pengarang['id_pengarang']."</td>";
					echo "<td>".$data_pengarang['nama_pengarang']."</td>";
					echo "<td>".$data_pengarang['email']."</td>";
					echo "<td>".$data_pengarang['telp']."</td>";
					echo "<td>".$data_pengarang['alamat']."</td>";
					echo "<td><a href='edit.php?id_pengarang=$data_pengarang[id_pengarang]' class='btn btn-primary'>Edit</a> | <a href='delete.php?id_pengarang=$data_pengarang[id_pengarang]' class='btn btn-danger'>Delete</a></td>";
				"</tr>";
				$no++;
				}
			?>
		</tbody>
	</table>
</body>
</html>