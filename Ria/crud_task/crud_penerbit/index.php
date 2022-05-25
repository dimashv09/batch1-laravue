<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	$penerbit = mysqli_query($mysqli, "SELECT *FROM Penerbit");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>


<center>
	<a href="../crud_buku/index.php">Buku</a>
	<a href="index.php">Penerbit</a>
	<a href="../crud_pengarang/index.php">Pengarang</a>
	<a href="../crud_katalog/index.php">Katalog</a>
	<hr>
</center>

<a href="add.php">Add New Penerbit</a><br/><br/>

	<table width='80%' border=1>

	<tr>
		<th>ID Penerbit</th>
		<th>Nama Penerbit</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Alamat</th>
		<th>Aksi</th>
		
	</tr>
	<?php
		while ($penerbit_data = mysqli_fetch_array($penerbit)) {
			echo "<tr>";
			echo "<td>". $penerbit_data['id_penerbit']."</td>";
			echo "<td>". $penerbit_data['nama_penerbit']."</td>";
			echo "<td>". $penerbit_data['email']."</td>";
			echo "<td>". $penerbit_data['telp']."</td>";
			echo "<td>". $penerbit_data['alamat']."</td>";
			echo "<td><a href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
