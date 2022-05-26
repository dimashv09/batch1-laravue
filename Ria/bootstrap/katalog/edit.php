<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
		include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

		$id_katalog = $_GET['id_katalog'];

		$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");

		while ($data = mysqli_fetch_array($katalog)) 
		{
    		# code...
    		$id_katalog = $data['id_katalog'];
    		$nama = $data['nama'];
		}
?>
<body>
	<div class="card-body">
	<a type="button" class="btn btn-outline-primary" href="index.php">Go to Home</a>
	<br/><br/>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="card-header">
 
	<form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
		<table width="25%" border="0">
			<div class="form-group">
			<tr> 
				<td>No</td>
				<td class="form-control" style="font-size: 11pt;"><?php echo $id_katalog; ?> </td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Nama Katalog</td>
				<td><input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			</div>
			<tr> 
				<td></td>
				<td><class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

	</div>
		</div>
			</div>
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if (isset($_POST['update'])) {
    		# code...
    		$id_katalog = $_GET['id_katalog'];
    		$nama = $_POST['nama'];
			
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalog SET id_katalog = '$id_katalog', nama = '$nama' WHERE id_katalog = '$id_katalog';");
			
			header("Location:index.php");
		}
	?>

</body>
</html>