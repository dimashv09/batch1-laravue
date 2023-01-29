<?php
	//koneksi ke database
	include_once('koneksi.php');
	//query database yang di perlukan
	$penerbit = mysqli_query($koneksi, "SELECT penerbit.*, judul, tahun FROM penerbit
									left join buku on penerbit.id_penerbit = buku.id_penerbit ORDER BY id_penerbit ASC;
									");

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
		<a href="../buku/index.php">Buku</a> |
		<a href="index.php">Penerbit</a> |
		<a href="../pengarang/index.php">Pengarang</a> |
		<a href="">Katalog</a> 
	</center>
	<br>

	<a href="add.php">Tambah Data</a>
	<table class="table table-bordered table-striped text-center">
		<thead class = "bg-secondary">
			<tr>
				<td>No</td>
				<td>Id Penerbit</td>
				<td>Nama Penerbit</td>
				<td>Email</td>
				<td>No tlpn</td>
				<td>Alamat</td>
				<td>Judul</td>
				<td>Tahun</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
				while($data_penerbit=mysqli_fetch_array($penerbit)){
				echo "<tr>";
					
					echo "<td>".$no."</td>";
					echo "<td>".$data_penerbit['id_penerbit']."</td>";
					echo "<td>".$data_penerbit['nama_penerbit']."</td>";
					echo "<td>".$data_penerbit['email']."</td>";
					echo "<td>".$data_penerbit['telp']."</td>";
					echo "<td>".$data_penerbit['alamat']."</td>";
					echo "<td>".$data_penerbit['judul']."</td>";
					echo "<td>".$data_penerbit['tahun']."</td>";
					echo "<td><a class='btn btn-primary' href='edit.php?id_penerbit=$data_penerbit[id_penerbit]'>Edit</a>    <a href='delete.php?id_penerbit=$data_penerbit[id_penerbit]' class='btn btn-danger'>Delete</a></td>
				</tr>";
				$no++;
				}
			?>
		</tbody>
	</table>
</body>

</html>