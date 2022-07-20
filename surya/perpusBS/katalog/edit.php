<html>

<head>
	<title>Edit Katalog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>
</head>

<?php
	include_once("../connect.php");
	$id_katalog = $_GET['id_katalog'];

	$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$nama = $katalog_data['nama'];
    }
?>

<body>
	<div class="container">
		<a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
		<br /><br />

		<form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">

			<table width="50%" border="0">
				<tr>
					<td>Nama Katalog</td>
					<td><input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-primary btn-sm" name="update" value="Ubah"></td>
				</tr>
			</table>
			<?php
			if(isset($_POST['update'])) {

				$id_katalog = $_GET['id_katalog'];
				$nama       = $_POST['nama'];
				
				include_once("../connect.php");

				$result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog';");

				header("Location:index.php");
			}
		?>
		</form>
	</div>

</body>

</html>