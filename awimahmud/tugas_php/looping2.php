<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>looping 2</title>
	<style>
		.table{
			table-layout: fixed;
		}
		.thead-color{
			background-color: #1F45FC;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="table table-striped table-bordered border-dark mt-4 text-center w-auto">
			<thead class="thead-color">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Kelas</th>
				</tr>
			</thead>
			<?php  for ($no = 1, $i=1, $a=10; $no<=10, $i<=1, $a>=1  ; $i++, $a--) { ?>
			<tbody>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo "Nama ke $i"; ?></td>
					<td><?php echo "Kelas $a"; ?></td>
				</tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
</body>
</html>