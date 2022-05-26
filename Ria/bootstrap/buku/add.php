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
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>
 
<body>
		<div class="card-body">
	<a type="button" class="btn btn-outline-primary" href="index.php">Go to Home</a>
	<br/><br/>
	</div>
		</div>

<div class="card">
		<div class="card-body">
			<div class="card-header">
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<div class="form-group">
			<tr> 
				<td>ISBN</td>
				<td><input type="text" name="isbn" class="form-control"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Judul</td>
				<td><input type="text" name="judul" class="form-control"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Tahun</td>
				<td><input type="text" name="tahun" class="form-control"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Penerbit</td>
				<td>
					<select class="custom-select" name="id_penerbit">
						<?php 
						    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
						    	echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Pengarang</td>
				<td>
					<select class="custom-select" name="id_pengarang">
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Katalog</td>
				<td>
					<select class="custom-select"name="id_katalog">
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Qty Stok</td>
				<td><input type="text" name="qty_stok" class="form-control"></td>
			</tr>
			</div>
			<div class="form-group">
			<tr> 
				<td>Harga Pinjam</td>
				<td><input type="text" name="harga_pinjam" class="form-control"></td>
			</tr>
			</div>
			<tr> 
				<td></td>
				<td class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
	</div>
</div>
</div>
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$isbn = $_POST['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
			
			header("Location:index.php");
		}
	?>
</body>
</html>