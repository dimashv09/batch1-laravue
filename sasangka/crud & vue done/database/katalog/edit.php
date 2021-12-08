<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Katalog | Edit</title>
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
	<?php
		include_once("../koneksi.php");
		$id = $_GET['id'];

		$katalog = mysqli_query($connect, "SELECT * FROM katalogs WHERE id='$id'");

		while($katalog_data = mysqli_fetch_array($katalog))
		{
			$nama = $katalog_data['nama'];
		}
	?>
	<body>
		<div class="container">
			<div class="navigation">
				<a href="../buku/index.php" class="navigation__link">Buku</a>
				<a href="../penerbit/index.php" class="navigation__link">Penerbit</a>
				<a href="../pengarang/index.php" class="navigation__link">Pengarang</a>
				<a href="../katalog/index.php" class="navigation__link">Katalog</a>
			</div>
			<a href="index.php" class="addb button">Back to home</a>
			<h3 class="page__title">Edit Katalog</h3>
			<form action="edit.php?id=<?php echo $id; ?>" method="POST">
				<div class="grid form">
					<div class="form__group">
						<div class="form__subgroup">
							<label for="" class="form__label">Nama Katalog</label>
							<div class="form__save">
								<input type="text" class="form__input" value="<?php echo $nama ?>" name="nama">
								<input type="submit" class="saveb button" name="Save" value="Save">
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php
		
				// Check If form submitted, insert form data into users table.
				if(isset($_POST['Save'])) {
					$id = $_GET['id'];
					$nama = $_POST['nama'];
					
					include_once("../koneksi.php");

					$result = mysqli_query($connect, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");
					
					header("Location:index.php");
				}
			?>
		</div>
	</body>
</html>