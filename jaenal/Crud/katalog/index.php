<!DOCTYPE html>
<html>
<head>
	<title>Katalog</title>
</head>
<?php 
include_once("../buku/connect.php");
$katalog = mysqli_query($mysqli, "SELECT katalog.*,id_katalog,nama FROM katalog ORDER BY id_katalog ASC");
$no=0;

 ?>
<body>
<div class="container">
	<div class="card">
		<div class="card-body">
			<center>
				<a href="../buku/index.php">Buku</a> |
			    <a href="../penerbit/index.php">Penerbit</a> |
			    <a href="../pengarang/index.php">Pengarang</a> |
			    <a href="index.php">Katalog</a>
			    <hr>
			</center>

			<a class="btn btn-primary" href="create.php">Create New Katalog</a><br><br>

			<table class="table" width="80%" border="1">
				<tr>
					<th>NO</th>
					<th>Nama</th>
					<th>Action</th>
				</tr>
				<?php 
					while($katalog_data = mysqli_fetch_array($katalog)){
						$no++;
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$katalog_data['nama']."</td>";
						echo "<td><a class='btn btn-primary' href='update.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
					}
				 ?>
			</table>
		</div>
	</div>
</div>

</body>
</html>