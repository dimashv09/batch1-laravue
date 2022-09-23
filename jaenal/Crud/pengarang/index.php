<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengarang</title>
</head>
<?php
include_once("../buku/connect.php");
$pengarang = mysqli_query($mysqli, "SELECT pengarang.*, id_pengarang,nama_pengarang,email,telp,alamat FROM pengarang");
$no = 0;
?>

<body>
	<center>
		<a href="../buku/index.php">Buku</a> |
		<a href="../penerbit/index.php">Penerbit</a> |
		<a href="../pengarang/index.php">Pengarang</a> |
		<a href="../katalog/index.php">Katalog</a>
		<hr>
	</center>

	<a href="create.php">Add New Pengarang</a><br><br>

	<table width="80%" border="1">
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No Telepon</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
		<?php
		while ($pengarang_data = mysqli_fetch_array($pengarang)) {
			$no++;
			echo "<tr>";
			echo "<td>" . $no . "</td>";
			echo "<td>" . $pengarang_data['nama_pengarang'] . "</td>";
			echo "<td>" . $pengarang_data['email'] . "</td>";
			echo "<td>" . $pengarang_data['telp'] . "</td>";
			echo "<td>" . $pengarang_data['alamat'] . "</td>";
			echo "<td><a href='update.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td></tr>";
		}


		?>
	</table>
	</div>
	</div>
	</div>
</body>

</html>