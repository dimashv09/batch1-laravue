<?php
//koneksi ke database
include_once('koneksi.php');

//query database
$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add data</title>
</head>
<body>
	<a href="index.php">Back</a>
	<br>
	<form action="add.php" method="post">
		<table>
			<tr>
				<td>ID Pengarang</td>
				<td><input type="text" name="id_pengarang"></td>
			</tr>
			<tr>
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_POST['submit'])){
			$id_pengarang = $_POST['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			$result1 = mysqli_query($koneksi, "INSERT INTO pengarang (id_pengarang, nama_pengarang, email, telp, alamat) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat')");
			if($result){
				echo "Data berhasil ditambahkan";
			}else{
				echo "data gagal ditambahkan";
			}
			
			header('Location: index.php');
	}

	?>
	
</body>
</html>