<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buku | Add</title>
	<style>
		@import url('../styles.css');
	</style>
</head>
<?php
	include_once("../connect.php");
	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
	$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
	$katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
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
		<h3 class="page__title">Add Buku</h3>
		<form action="add.php" method="post" name="form_add">
			<div class="grid form">
				<div class="form__group">
					<div class="form__subgroup">
						<label for="" class="form__label">ISBN</label>
						<input type="text" class="form__input" placeholder="contoh: '1234567'" name="isbn">
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Judul Buku</label>
						<input type="text" class="form__input" placeholder="contoh: 'Sherlok Holmes'" name="judul">
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Tahun</label>
						<input type="text" class="form__input" placeholder="contoh: '2020'" name="tahun">
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Harga Pinjam</label>
						<input type="text" class="form__input" placeholder="contoh: '25000'" name="harga_pinjam">
					</div>
				</div>
				<div class="form__group">
					<div class="form__subgroup">
						<label for="" class="form__label">Penerbit</label>
						<select class="form__input" name="id_penerbit">
							<option value="" disabled selected>Pilih penerbit</option>
							<?php
								while($penerbit_data = mysqli_fetch_array($penerbit)) {
									echo "<option value='".$penerbit_data['id']."'>".$penerbit_data['nama_penerbit']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Pengarang</label>
						<select class="form__input" name="id_pengarang">
							<option value="" disabled selected>Pilih pengarang</option>
							<?php
								while($pengarang_data = mysqli_fetch_array($pengarang)) {
									echo "<option value='".$pengarang_data['id']."'>".$pengarang_data['nama_pengarang']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Katalog</label>
						<select class="form__input" name="id_katalog">
							<option value="" disabled selected>Pilih katalog</option>
							<?php
								while($katalog_data = mysqli_fetch_array($katalog)) {
									echo "<option value='".$katalog_data['id']."'>".$katalog_data['nama']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form__subgroup">
						<label for="" class="form__label">Stok</label>
						<input type="text" class="form__input" placeholder="contoh: '25'" name="qty_stok">
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
				$isbn = $_POST['isbn'];
				$judul = $_POST['judul'];
				$tahun = $_POST['tahun'];
				$id_penerbit = $_POST['id_penerbit'];
				$id_pengarang = $_POST['id_pengarang'];
				$id_katalog = $_POST['id_katalog'];
				$qty_stok = $_POST['qty_stok'];
				$harga_pinjam = $_POST['harga_pinjam'];
				
				include_once("../connect.php");

				$result = mysqli_query($mysqli, "INSERT INTO `bukus` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
				
				header("Location:index.php");
			}
		?>
	</div>
</body>
</html>