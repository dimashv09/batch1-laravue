<?php
include_once('koneksi.php');
$katalog = mysqli_query($koneksi, "SELECT * FROM katalog");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data</title>
</head>
<body>
	<a href="index.php">Back</a>
	<br>
	<form action="add.php" method="POST" name="Add">
		<table>
			<tr>
				<td>ID Katalog</td>
				<td><input type="text" name='id_katalog'></td>
			</tr>
			<tr>
				<td>Nama Katalog</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah" name="Submit"></td>
			</tr>
		</table>
	</form>
	<?php
	if(isset($_POST['Submit'])){
		$id_katalog = $_POST['id_katalog'];
		$nama = $_POST['nama'];

		// include_once('koneksi.php');

		$result = mysqli_query($koneksi, "INSERT INTO katalog(id_katalog, nama) VALUES('$id_katalog', '$nama');");
		
		
		header('Location: index.php');
	}
	?>
</body>
</html>