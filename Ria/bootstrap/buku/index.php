<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	$buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku
									LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
									LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
									LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
									ORDER BY judul ASC");
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	 <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container">
                    <a class="nav-link" href="index.php">Buku</a>
                    <a class="nav-link" href="../penerbit/index.php">Penerbit</a>
                    <a class="nav-link" href="../pengarang/index.php">Pengarang</a>
                    <a class="nav-link" href="../katalog/index.php">Katalog</a>
        </div>
    </nav>


<div class="container mt-3">
	<button type="button" class="btn btn-outline-primary">
<a class="nav-item nav-link active" href="add.php">Add New Buku</a>
	</button>
<br/><br/>

	<table class="table table-striped table-bordered" class="table" width='80%' border=1>

	<tr>
		<th>ISBN</th>
		<th>Judul</th>
		<th>Tahun</th>
		<th>Pengarang</th>
		<th>Penerbit</th>
		<th>Katalog</th>
		<th>Stok</th>
		<th>Harga Pinjam</th>
		<th>Aksi</th>
	</tr>
	<?php
		while ($buku_data = mysqli_fetch_array($buku)) {
			echo "<tr>";
			echo "<td>". $buku_data['isbn']."</td>";
			echo "<td>". $buku_data['judul']."</td>";
			echo "<td>". $buku_data['tahun']."</td>";
			echo "<td>". $buku_data['nama_pengarang']."</td>";
			echo "<td>". $buku_data['nama_penerbit']."</td>";
			echo "<td>". $buku_data['nama_katalog']."</td>";
			echo "<td>". $buku_data['qty_stok']."</td>";
			echo "<td>". $buku_data['harga_pinjam']."</td>";
			echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
