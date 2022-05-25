<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	$pengarang = mysqli_query($mysqli, "SELECT *FROM pengarang");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>


<center>
	<a href="../crud_buku/index.php">Buku</a>
	<a href="../crud_penerbit/index.php">Penerbit</a>
	<a href="index.php">Pengarang</a>
	<a href="../crud_katalog/index.php">Katalog</a>
	<hr>
</center>

<a href="add.php">Add New Pengarang</a><br/><br/>

	<table width='80%' border=1>

	<tr>
		<th>ID Pengarang</th>
		<th>Nama Pengarang</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Alamat</th>
		<th>Aksi</th>
		
	</tr>
	<?php
		while ($pengarang_data = mysqli_fetch_array($pengarang)) {
			echo "<tr>";
			echo "<td>". $pengarang_data['id_pengarang']."</td>";
			echo "<td>". $pengarang_data['nama_pengarang']."</td>";
			echo "<td>". $pengarang_data['email']."</td>";
			echo "<td>". $pengarang_data['telp']."</td>";
			echo "<td>". $pengarang_data['alamat']."</td>";
			echo "<td><a href='edit.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
