<?php
$file = "data.json";
$data = file_get_contents($file);
$json = json_decode($data, TRUE);

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<style>
		.container-fluid {
			background-color: yellow;
			height: 50px;
			padding: 10px;
		}
	</style>
	<title>Document</title>
</head>

<body>
	<div class="container-fluid col-12">
		<h4>Daftar Nilai</h4>
	</div>
	<div class="container" style="border: 1px; margin-top: 10px;">
		<table class="table table-bordered border-dark table-striped mt-5">
			<thead>
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
				<?php foreach ($json as $json) : ?>
				  <?php for ($no = 1; $no <= 10;$no++) { ?>
				    <?php 

						$nilai = $json['nilai'];
						
						if ($nilai >= 90) {
							echo " ";
						} elseif ($hasil >= 80 && $hasil < 90) {
							echo $add_data[1];
						}
						if ($hasil >= 70 && $hasil < 80) {
							echo $add_data[2];
						} else {
							echo $add_data[3];
						}
					?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $json['nama'] ?></td>
							<td><?= $json['tanggal_lahir'] ?></td>
							<td><?= $json['umur'] ?></td>
							<td><?= $json['alamat'] ?></td>
							<td><?= $json['kelas'] ?></td>
							<td><?= $json['nilai'] ?></td>
							<td><?echo $hasil; ?></td>
						</tr>
					
				  <?php }?>
				  
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>