<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pengarang | Edit</title>
		<style>
			@import url('../styles.css');
		</style>
	</head>
	<?php
		include_once("../koneksi.php");
		$id = $_GET['id'];

		$pengarang = mysqli_query($connect, "SELECT * FROM pengarangs WHERE id='$id'");

		while($pengarang_data = mysqli_fetch_array($pengarang))
		{
			$nama = $pengarang_data['nama_pengarang'];
			$email = $pengarang_data['email'];
			$telp = $pengarang_data['telp'];
			$alamat = $pengarang_data['alamat'];
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
			<h3 class="page__title">Edit Pengarang</h3>
			<form action="edit.php?id=<?php echo $id; ?>" method="POST">
				<div class="grid form">
					<div class="form__group">
						<div class="form__subgroup">
							<label for="" class="form__label">Nama</label>
							<input type="text" class="form__input" value="<?php echo $nama ?>" name="nama">
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Email</label>
							<input type="text" class="form__input" value="<?php echo $email ?>" name="email">
						</div>
						
					</div>
					<div class="form__group">
						<div class="form__subgroup">
							<label for="" class="form__label">Telepon</label>
							<input type="text" class="form__input" value="<?php echo $telp ?>" name="telp">
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Alamat</label>
							<input type="text" class="form__input" value="<?php echo $alamat ?>" name="alamat">
						</div>
					</div>
				</div>
				<div class="form__save">
					<input type="submit" class="saveb button" name="Update" value="Update">
				</div>
			</form>
			<?php
				if(isset($_POST['Update'])) {
					$id = $_GET['id'];
					$nama = $_POST['nama'];
					$email = $_POST['email'];
					$telp = $_POST['telp'];
					$alamat = $_POST['alamat'];
					
					include_once("../koneksi.php");

					$result = mysqli_query($mysqli, "UPDATE pengarangs SET nama_pengarang = '$nama', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
					
					header("Location:index.php");
				}
			?>
		</div>
	</body>
</html>