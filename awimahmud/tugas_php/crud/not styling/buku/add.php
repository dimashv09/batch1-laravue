<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Buku</title>
</head>
<?php
	include_once('connect.php');
	$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
	$pengarang = mysqli_query($koneksi, "SELECT * FROM pengarang");
	$katalog = mysqli_query($koneksi, "SELECT * FROM katalog");
?>
<body>
	<a href="index.php">Go to Home</a>
	<br><br>

	<form action="add.php" method="POST" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>ISBN</td>
				<td><input type="text" style="color: black;" name="isbn"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" style="color: black;" name="judul"></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" style="color:black;" name="tahun"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>
					<select name="id_penerbit" style="color: black;">
						<?php
							while($penerbit_data = mysqli_fetch_assoc($penerbit)){
							echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td>
					<select name="id_pengarang" style="color: black;">
						<?php
							while($pengarang_data = mysqli_fetch_array($pengarang)){
								echo "<option value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Katalog</td>
				<td>
					<select name="id_katalog" style="color: black;">
						<?php
							while($katalog_data = mysqli_fetch_array($katalog)){
							echo "<option value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Qty Stok</td>
				<td><input type="text" style="color:black;" name="qty_stok"></td>
			</tr>
			<tr>
				<td>Harga Pinjam</td>
				<td><input type="text" style="color:black;" name="harga_pinjam"></td>
			</tr>
			<tr>
				<td><input type="submit" style="color:black;" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
	<?php
		if(isset($_POST['submit'])){
		$isbn = $_POST['isbn'];
		$judul = $_POST['judul'];
		$tahun = $_POST['tahun'];
		$id_penerbit = $_POST['id_penerbit'];
		$id_pengarang = $_POST['id_pengarang'];
		$id_katalog = $_POST['id_katalog'];
		$qty_stok = $_POST['qty_stok'];
		$harga_pinjam = $_POST['harga_pinjam'];
		
		include_once("connect.php");
		
		//masukan data buku kedalam tabel
		$result = mysqli_query($koneksi, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");
		header("location:index.php");
	}
	?>
</body>
</html>