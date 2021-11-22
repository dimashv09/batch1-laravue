<html>

<head>
	<title>Edit Data Katalog</title>
</head>

<?php
include_once("connect.php");
$id = $_GET['id'];

$katalog = mysqli_query($conn, "SELECT * FROM katalogs WHERE id='$id'");

while ($k = mysqli_fetch_array($katalog)) {
	$nama = $k['nama'];
}
?>

<body>
	<a href="katalog.php">Back</a>
	<br /><br />

	<form action="editKt.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr>
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
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

		include_once("connect.php");

		$result = mysqli_query($conn, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");

		header("Location:katalog.php");
	}
	?>
</body>

</html>