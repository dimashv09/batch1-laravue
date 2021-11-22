<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Katalog | Add</title>
	<style>
		@import url('../styles.css');
		.form__save {
			display: flex;
		}
		.saveb {
			margin-bottom: 0;
		}
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
		<h3 class="page__title">Add Katalog</h3>
		<form action="add.php" method="post" name="form_add">
			<div class="grid form">
				<div class="form__group">
					<div class="form__subgroup">
						<label for="" class="form__label">Nama Katalog</label>
						<div class="form__save">
							<input type="text" class="form__input" placeholder="contoh: 'Buku Anak'" name="nama">
							<input type="submit" class="saveb button" name="Save" value="Save">
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
	
			// Check If form submitted, insert form data into users table.
			if(isset($_POST['Save'])) {
				$nama = $_POST['nama'];
				
				include_once("../connect.php");

				$result = mysqli_query($mysqli, "INSERT INTO `katalogs` (`nama`) VALUES ('$nama');");
				
				header("Location:index.php");
			}
		?>
	</div>
</body>
</html>