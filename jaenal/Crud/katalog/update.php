<!DOCTYPE html>
<html>
<head>
	<title>Edit Katalog</title>
</head>
<?php 
include_once("../buku/connect.php");
$id_katalog = $_GET['id_katalog'];
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");

while($katalog_data = mysqli_fetch_array($katalog)) {
	$nama = $katalog_data['nama'];
}

 ?>
<body>
<div class="container">
	<div class="card">
		<div class="card-header">
			<a class="btn btn-primary" href="index.php">Go Home</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<form action="update.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="update" value="Update">
					</div>
			</form>
</body>
<?php 

if (isset($_POST['update'])) {
	$nama = $_POST['nama'];

	include_once("../buku/connect.php");

	$result = mysqli_query($mysqli, "UPDATE katalog SET nama='$nama' WHERE id_katalog ='$id_katalog';");
	header("Location:index.php");
}

 ?>
</html>