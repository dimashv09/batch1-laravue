<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Buku | Edit</title>
		<style>
			@import url('../styles.css');
		</style>
	</head>
	<?php
		include_once("../koneksi.php");
		$isbn = $_GET['isbn'];

		$buku = mysqli_query($connect, "SELECT * FROM bukus WHERE isbn='$isbn'");
		$penerbit = mysqli_query($connect, "SELECT * FROM penerbits");
		$pengarang = mysqli_query($connect, "SELECT * FROM pengarangs");
		$katalog = mysqli_query($connect, "SELECT * FROM katalogs");

		while($buku_data = mysqli_fetch_array($buku))
		{
			$judul = $buku_data['judul'];
			$isbn = $buku_data['isbn'];
			$tahun = $buku_data['tahun'];
			$id_penerbit = $buku_data['id_penerbit'];
			$id_pengarang = $buku_data['id_pengarang'];
			$id_katalog = $buku_data['id_katalog'];
			$qty_stok = $buku_data['qty_stok'];
			$harga_pinjam = $buku_data['harga_pinjam'];
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
			<h3 class="page__title">Edit Buku</h3>
			<form action="edit.php?isbn=<?php echo $isbn; ?>" method="POST">
				<div class="grid form">
					<div class="form__group">
						<div class="form__subgroup">
							<label for="" class="form__label">ISBN</label>
							<input type="text" class="form__input" value="<?php echo $isbn ?>" disabled name="isbn">
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Judul Buku</label>
							<input type="text" class="form__input" value="<?php echo $judul ?>" name="judul">
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Tahun</label>
							<input type="text" class="form__input" value="<?php echo $tahun ?>" name="tahun">
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Harga Pinjam</label>
							<input type="text" class="form__input" value="<?php echo $harga_pinjam ?>" name="harga_pinjam">
						</div>
					</div>
					<div class="form__group">
						<div class="form__subgroup">
							<label for="" class="form__label">Penerbit</label>
							<select class="form__input" name="id_penerbit">
								<?php
									while($penerbit_data = mysqli_fetch_array($penerbit)) {
										echo "<option ".($penerbit_data['id'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id']."'>".$penerbit_data['nama_penerbit']."</option>";
									}
								?>
							</select>
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Pengarang</label>
							<select class="form__input" name="id_pengarang">
								<?php
									while($pengarang_data = mysqli_fetch_array($pengarang)) {
										echo "<option ".($pengarang_data['id'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id']."'>".$pengarang_data['nama_pengarang']."</option>";
									}
								?>
							</select>
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Katalog</label>
							<select class="form__input" name="id_katalog">
								<?php
									while($katalog_data = mysqli_fetch_array($katalog)) {
										echo "<option ".($katalog_data['id'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id']."'>".$katalog_data['nama']."</option>";
									}
								?>
							</select>
						</div>
						<div class="form__subgroup">
							<label for="" class="form__label">Stok</label>
							<input type="text" class="form__input" value="<?php echo $qty_stok ?>" name="qty_stok">
						</div>
					</div>
				</div>
				<div class="form__save">
					<input type="submit" class="saveb button" name="Update" value="Update">
				</div>
			</form>
			<?php
				if(isset($_POST['Update'])) {
					$isbn = $_GET['isbn'];
					$judul = $_POST['judul'];
					$tahun = $_POST['tahun'];
					$id_penerbit = $_POST['id_penerbit'];
					$id_pengarang = $_POST['id_pengarang'];
					$id_katalog = $_POST['id_katalog'];
					$qty_stok = $_POST['qty_stok'];
					$harga_pinjam = $_POST['harga_pinjam'];
					
					include_once("../connect.php");

					$result = mysqli_query($connect, "UPDATE bukus SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
					
					header("Location:index.php");
				}
			?>
		</div>
	</body>
</html>