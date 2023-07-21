<?php 
$file = "data.json";
$data = file_get_contents($file);
$json = json_decode($data, true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<style>
		header {
			background-color: darkgrey;
			padding: 15px;
			padding-left: 45px;
			height: 60px;
			font-size: 400px;
		
		}
		title {
			font-family: monospace;
		}
		</style>

	<title>Daftar Nilai</title>
</head>
<body>
	<header class="col-12"><h4>Daftar Nilai</h4></header>
	<div class="mx-auto col-8">
		<table class="table table-bodered boder-dark text-center table-striped mt-5">
			<thead class="bg-primary text-white" style="height: 45px; font-size:large;">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Umur</th>
				<th>Alamat</th>
				<th>Kelas</th>
				<th>Nilai</th>
				<th>Hasil</th>
			</tr>
		</thead>
		<tbody>
	            <?php foreach ($json as $no => $json) : ?>
					<?php $hasil = $json['nilai']; ?>

					<tr>
						<td><?= $no+1 ?></td>
						<td><?= $json['nama'] ?></td>
						<td><?= $json['tanggal_lahir'] ?></td>
						<td><?php 
						// tanggal lahir
							$tanggal_lahir = new DateTime($json['tanggal_lahir']);
							$sekarang = new DateTime();
							$umur = $sekarang->diff($tanggal_lahir)->y;

							echo $umur . "tahun";
							?>
						</td>
						<td><?= $json['alamat'] ?></td>
						<td><?= $json['kelas'] ?></td>
						<td><?= $json['nilai'] ?></td>
						<td><?php
						// perhitungan nilai
						   if ($json['nilai'] >=91) {
							echo "A";
						   } elseif ($json['nilai'] >=81) {
							echo "B";
						   } elseif ($json['nilai'] >=71) {
							echo "C";
						   } elseif ($json['nilai'] >61) {
							echo "D";
						   } else { echo "E"; }

						   ?></td>
						</tr>
				<?php endforeach ?>
		</tbody>

		</table>
	</div>
	
</body>
</html>