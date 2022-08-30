<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php 
include_once("../buku/connect.php");
$penerbit = mysqli_query($mysqli, "SELECT penerbit.*,id_penerbit, nama_penerbit,email,telp,alamat FROM penerbit ORDER BY id_penerbit ASC");
	$no = 0;




 ?>
<body>
<div class="container">
	<div class="card">
		<div class="card-body">
			<center>
				<a href="../buku/index.php">Buku</a> |
			    <a href="../penerbit/index.php">Penerbit</a> |
			    <a href="../pengarang/index.php">Pengarang</a> |
			    <a href="../katalog/index.php">Katalog</a>
			    <hr>
			</center>

			<a class="btn btn-primary" href="create.php">Create New Penerbit</a><br><br>

			<table class="table" width="80%" border="1">
				<tr>
					<th>No</th>
					<th>Nama Penerbit</th>
					<th>Email</th>
					<th>Nomor Telepon</th>
					<th>Alamat</th>
					<th>Action</th>
				</tr>
				<?php 
					while($penerbit_data = mysqli_fetch_array($penerbit)) {
						$no++;
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$penerbit_data['nama_penerbit']."</td>";
						echo "<td>".$penerbit_data['email']."</td>";
						echo "<td>".$penerbit_data['telp']."</td>";
						echo "<td>".$penerbit_data['alamat']."</td>";
						echo "<td><a class='btn btn-primary' href='update.php?id_penerbit=$penerbit_data[id_penerbit]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Delete</a></td></tr>";

					}
				 ?>
			</table>
		</div>
	</div>
</div>
</body>
</html>