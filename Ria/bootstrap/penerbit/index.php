<?php
	include_once("../connect.php");
	$penerbit = mysqli_query($mysqli, "SELECT *FROM Penerbit");
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>


<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container">
    <a class="nav-link" href="../buku/index.php">Buku</a>
	<a class="nav-link" href="index.php">Penerbit</a>
	<a class="nav-link" href="../pengarang/index.php">Pengarang</a>
	<a class="nav-link" href="../katalog/index.php">Katalog</a>
		</div>
</nav>

<div class="container mt-3">
	<button type="button" class="btn btn-outline-primary">

<a class="nav-item nav-link active" href="add.php">Add New Penerbit</a>
	</button>
<br/><br/>

	<table class="table table-striped table-bordered" class="table" width='80%' border=1>

	<tr>
		<th>ID Penerbit</th>
		<th>Nama Penerbit</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Alamat</th>
		<th>Aksi</th>
		
	</tr>
	<?php
		while ($penerbit_data = mysqli_fetch_array($penerbit)) {
			echo "<tr>";
			echo "<td>". $penerbit_data['id_penerbit']."</td>";
			echo "<td>". $penerbit_data['nama_penerbit']."</td>";
			echo "<td>". $penerbit_data['email']."</td>";
			echo "<td>". $penerbit_data['telp']."</td>";
			echo "<td>". $penerbit_data['alamat']."</td>";
			echo "<td><a class='btn btn-primary' href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
