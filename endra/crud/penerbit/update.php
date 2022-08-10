<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Penerbit</title>

</head>

<?php

include_once("../buku/connect.php");
$id_penerbit = $_GET['id_penerbit'];

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");



while ($penerbit_data = mysqli_fetch_array($penerbit)) {
	$nama_penerbit = $penerbit_data['nama_penerbit'];
	$email = $penerbit_data['email'];
	$telp = $penerbit_data['telp'];
	$alamat = $penerbit_data['alamat'];
}
?>

<body>
	<a href="index.php">Go Home</a>

	<form action="update.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
		<table width="25%" border="0">

			<label>Nama Penerbit</label>
			<input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>">

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
		$nama_penerbit = $_POST['nama_penerbit'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];

		include_once("../buku/connect.php");

		$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit='$nama_penerbit', email='$email',telp='$telp',alamat='$alamat' WHERE id_penerbit = '$id_penerbit';");

		header("Location:index.php");
	}

	?>
</body>

</html>