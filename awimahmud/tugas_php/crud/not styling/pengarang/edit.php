<?php
//connection
include_once('koneksi.php');

//get id
$id_pengarang = $_GET['id_pengarang'];

//query database pengarang
$pengarang = "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'";
$result = mysqli_query($koneksi, $pengarang);
$data_pengarang = mysqli_fetch_assoc($result);

$id_pengarang = $data_pengarang['id_pengarang'];
$nama_pengarang = $data_pengarang['nama_pengarang'];
$email = $data_pengarang['email'];
$telp = $data_pengarang['telp'];
$alamat = $data_pengarang['alamat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit dat</title>
	<style>
		input{
			color:black;
		}
	</style>
</head>
<body>
	<a href="index.php">Back</a>
	<br><br>
	
	<form action="edit.php?id_pengarang=<?php echo $id_pengarang;?>" method='POST'>
		<table>
			<tr>
				<td>ID Pengarang</td>
				<td style="font-size: 11pt;"><?php echo $id_pengarang?></td>
			</tr>
			<tr>
				<td>Nama Penggarang</td>
				<td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang;?>"></td>
			</tr>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp;?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" style="color:black;"><?php echo $alamat;?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php
	if (isset($_POST['update'])) {
		$id_pengarang = $_GET['id_pengarang'];
		$nama_pengarang = $_POST['nama_pengarang'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];


		$result = mysqli_query($koneksi, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");

		if ($result) {
			echo "Data berhasil diupdate";
		} else {
			echo "Error: " . mysqli_error($koneksi);
		}

		header('Location: index.php');
	}
	?>
</body>
</html>