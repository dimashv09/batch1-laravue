<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	$katalog = mysqli_query($mysqli, "SELECT *FROM Katalog");
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
	<a class="nav-link" href="../buku/index.php">Buku</a>
	<a class="nav-link" href="../penerbit/index.php">Penerbit</a>
	<a class="nav-link" href="../pengarang/index.php">Pengarang</a>
	<a class="nav-link" href="index.php">Katalog</a>
		</div>
</nav>


<div class="container mt-3">
	<button type="button" class="btn btn-outline-primary">
<a class="nav-item nav-link active" href="add.php">Add New Katalog</a>
	</button>
<br/><br/>
	<table class="table table-striped table-bordered" class="table" width='80%' border=1>

	<tr>
		<th>No Katalog</th>
		<th>Nama Katalog</th>
		<th>Aksi</th>
		
	</tr>
	<?php
		while ($katalog_data = mysqli_fetch_array($katalog)) {
			echo "<tr>";
			echo "<td>". $katalog_data['id_katalog']."</td>";
			echo "<td>". $katalog_data['nama']."</td>";
			echo "<td><a class='btn btn-primary' href='edit.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
		}
	?>
	</table>
</body>
</html>
