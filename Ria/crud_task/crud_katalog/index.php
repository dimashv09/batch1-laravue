<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	$katalog = mysqli_query($mysqli, "SELECT *FROM Katalog");
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
	<a href="../crud_pengarang/index.php">Pengarang</a>
	<a href="index.php">Katalog</a>
	<hr>
</center>

<a href="add.php">Add New Katalog</a><br/><br/>

	<table width='80%' border=1>

	<tr>
		<th>No Katalog</th>
		<th>Nama Katalog</th>
		<th>Aksi</th>
		
	</tr>
	<?php
		while ($katalog_data = mysqli_fetch_array($katalog)) {
			echo "<tr>";
			echo "<td>". $katalog_data['id_katalog']."</td>";
			echo "<td>". $katalog_data['nama']."</td>";
			echo "<td><a href='edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
