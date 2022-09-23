<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit pengarang</title>

</head>

<?php

include_once("../buku/connect.php");
$id_pengarang = $_GET['id_pengarang'];

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");



while ($pengarang_data = mysqli_fetch_array($pengarang)) {
	$nama_pengarang = $pengarang_data['nama_pengarang'];
	$email = $pengarang_data['email'];
	$telp = $pengarang_data['telp'];
	$alamat = $pengarang_data['alamat'];
}
?>

<body>
	<a href="index.php">Go Home</a>

	<form action="update.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
		<table width="25%" border="0">

			<label>Nama pengarang</label>
			<input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>">

			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">

			<label>Nomor Telepon</label>
			<input type="number" name="telp" value="<?php echo $telp; ?>">

			<label>Alamat</label>
			<input type="text" name="alamat" value="<?php echo $alamat; ?>">

			<input type="submit" name="update">

		</table>
	</form>

	<?php

	if (isset($_POST['update'])) {
		$nama_pengarang = $_POST['nama_pengarang'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];

		include_once("../buku/connect.php");

		$result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang='$nama_pengarang', email='$email',telp='$telp',alamat='$alamat' WHERE id_pengarang = '$id_pengarang';");

		header("Location:index.php");
	}

	?>
</body>

</html>