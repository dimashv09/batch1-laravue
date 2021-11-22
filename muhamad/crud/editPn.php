<html>

<head>
	<title>Edit Data Penerbit</title>
</head>

<?php
include_once("connect.php");
$id = $_GET['id'];

$penerbit = mysqli_query($conn, "SELECT * FROM penerbits WHERE id='$id'");

while ($p = mysqli_fetch_array($penerbit)) {
	$nama = $p['nama_penerbit'];
	$email = $p['email'];
	$telp = $p['telp'];
	$alamat = $p['alamat'];
}
?>

<body>
	<a href="penerbit.php">Back</a>
	<br /><br />

	<form action="editPn.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr>
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td>No. HP</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" name="update">Save</button></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['update'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];

		include_once("connect.php");

		$result = mysqli_query($conn, "UPDATE penerbits SET nama_penerbit = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");

		header("Location:penerbit.php");
	}
	?>
</body>

</html>