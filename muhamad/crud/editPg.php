<html>

<head>
	<title>Edit Data Pengarang</title>
</head>

<?php
include_once("connect.php");
$id = $_GET['id'];

$pengarang = mysqli_query($conn, "SELECT * FROM pengarangs WHERE id='$id'");

while ($p = mysqli_fetch_array($pengarang)) {
	$nama = $p['nama_pengarang'];
	$email = $p['email'];
	$telp = $p['telp'];
	$alamat = $p['alamat'];
}
?>

<body>
	<a href="pengarang.php">Back</a>
	<br /><br />

	<form action="editPg.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr>
				<td>Nama Pengarang</td>
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

		$result = mysqli_query($conn, "UPDATE pengarangs SET nama_pengarang = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");

		header("Location:pengarang.php");
	}
	?>
</body>

</html>