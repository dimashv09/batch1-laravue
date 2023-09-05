<?php
include_once('../connect.php');

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit ORDER BY nama_penerbit ASC");

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

	<a href="add.php">Tambah Data Penerbit</a><br><br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID penerbit</th>
				<th>Nama penerbit</th>
				<th>Email</th>
				<th>Telp</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			while($data_penerbit = mysqli_fetch_assoc($penerbit)){
				echo "<tr>
					  <td>".$no++."</td>
					  <td>".$data_penerbit['id_penerbit']."</td>
					  <td>".$data_penerbit['nama_penerbit']."</td>
					  <td>".$data_penerbit['email']."</td>
					  <td>".$data_penerbit['telp']."</td>
					  <td>".$data_penerbit['alamat']."</td>
					  <td><a href='edit.php?id_penerbit=$data_penerbit[id_penerbit]' class='btn btn-primary'>Edit</a>  <a href='delete.php?id_penerbit=$data_penerbit[id_penerbit]' class='btn btn-danger'>Delete</a></td>
				
					</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>