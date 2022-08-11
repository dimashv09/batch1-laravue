<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Katalog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php
include_once("../buku/connect.php");
$katalog = mysqli_query($mysqli, "SELECT katalog.*,id_katalog,nama FROM katalog ORDER BY id_katalog ASC");
$no = 0;

?>

<body>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<center>
					<a href="../buku/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Buku</strong></mark></abbr></a> |
					<a href="../penerbit/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Penerbit</strong></mark></abbr></a> |
					<a href="../pengarang/index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Pengarang</strong></mark></abbr></a> |
					<a href="index.php"><abbr title="HyperText Markup Language" class="initialism"><mark><strong>Katalog</strong></mark></abbr></a>
					<hr>
				</center>

				<a class="btn btn-outline-success" href="create.php">Create New Katalog</a><br><br>

				<table class="table" width="80%" border="1">
					<tr class="table-success">
						<th>NO</th>
						<th>Nama</th>
						<th>Action</th>
					</tr>
					<?php
					while ($katalog_data = mysqli_fetch_array($katalog)) {
						$no++;
						echo "<tr>";
						echo "<td>" . $no . "</td>";
						echo "<td>" . $katalog_data['nama'] . "</td>";
						echo "<td><a class='btn btn-info btn-sm'  href='update.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-warning btn-sm' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
					}
					?>
				</table>
			</div>
		</div>
	</div>

</body>

</html>