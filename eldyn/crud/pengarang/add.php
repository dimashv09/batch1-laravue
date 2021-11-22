<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		@import url('../styles.css');
	</style>
</head>
<body>
	<div class="container">
		<div class="navigation">
			<a href="../buku/index.php" class="navigation__link">Buku</a>
			<a href="../penerbit/index.php" class="navigation__link">Penerbit</a>
			<a href="../pengarang/index.php" class="navigation__link">Pengarang</a>
			<a href="../katalog/index.php" class="navigation__link">Katalog</a>
		</div>
		<a href="index.php" class="addb button">Back to home</a>
		<h3 class="page__title">Add Pengarang</h3>
		<form action="add.php" method="post" name="form_add">
			<div class="grid form">
				<div class="form__group">
					<div class="form__subgroup">
						<label for="" class="form__label">Nama</label>
						<input type="text" class="form__input" placeholder="John Doe" name="nama">
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Email</label>
						<input type="text" class="form__input" placeholder="john@doe.com" name="email">
					</div>
					
				</div>
				<div class="form__group">
					<div class="form__subgroup">
						<label for="" class="form__label">Telepon</label>
						<input type="text" class="form__input" placeholder="081123456789" name="telp">
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Alamat</label>
						<input type="text" class="form__input" placeholder="Cikarang" name="alamat">
					</div>
				</div>
			</div>
			<div class="form__save">
				<input type="submit" class="saveb button" name="Save" value="Save">
			</div>
		</form>
		<?php
	
			// Check If form submitted, insert form data into users table.
			if(isset($_POST['Save'])) {
				$nama = $_POST['nama'];
				$email = $_POST['email'];
				$telp = $_POST['telp'];
				$alamat = $_POST['alamat'];
				
				include_once("connect.php");

				$result = mysqli_query($mysqli, "INSERT INTO `pengarangs` (`nama_pengarang`, `email`, `telp`, `alamat`) VALUES ('$nama', '$email', '$telp', '$alamat');");
				
				header("Location:index.php");
			}
		?>
	</div>
</body>
</html>