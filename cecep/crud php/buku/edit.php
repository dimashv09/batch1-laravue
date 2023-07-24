<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Edit Buku</title>
</head>
<?php
	//mengambil database
	include_once("connect.php");
	//mengambil data buku berdasarkan idnya yaitu isbn dan tampilkan
	$isbn = $_GET['isbn'];

	//query menampilkan isi database
	$buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn = '$isbn'");
	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
	$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
	$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

	//buat kondisi untuk query data lebih spesifik
	while($data_buku = mysqli_fetch_array($buku)){
		$judul = $data_buku['judul'];
		$isbn = $data_buku['isbn'];
		$tahun = $data_buku['tahun'];
		$id_penerbit = $data_buku['id_penerbit'];
		$id_pengarang = $data_buku['id_pengarang'];
		$id_katalog = $data_buku['id_katalog'];
		$qty_stok = $data_buku['qty_stok'];
		$harga_pinjam = $data_buku['harga_pinjam'];

	}

?>
<body>
	<!-- link untuk kembali ke halaman utama yaitu index.php -->
	<a href="index.php">Go to Home</a>
	<br><br>

	<!-- form untuk input dan submit data -->
	<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post" name="update_buku"
	>
		<!-- tabel -->
		<table width="25%" border="0">
			<tr>
				<td>ISBN</td>
				<td style="font-size: 11pt;"><?php echo $isbn; ?> </td>	
			<tr>
				<td>Judul</td>
				<td><input type="text" style="color:black;" name="judul" value="<?php echo $judul?>"></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" style="color:black;" name="tahun" value="<?php echo $tahun?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>
					<select name="id_penerbit" style="color: black;">
						<?php 
						while($penerbit_data = mysqli_fetch_array($penerbit)){
							echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '')." value = '".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>pengarang</td>
				<td>
					<select name="id_pengarang" style="color: black;">
						<?php 
						while($pengarang_data = mysqli_fetch_array($pengarang)){
							echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value = '".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Katalog</td>
				<td>
					<select name="id_katalog" style="color:black;">
						<?php 
						while($katalog_data = mysqli_fetch_array($katalog)){
							echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '')." value = '".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Qty Stok</td>
				<td><input type="text" style="color:black;" name="qty_stok" value="<?php echo $qty_stok ?>"></td>
			</tr>
			<tr>
				<td>Harga_pinjam</td>
				<td><input type="text" style="color:black;" name="harga_pinjam" value="<?php echo $harga_pinjam ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" style="color:black;" name="update"></td>
			</tr>
		</table>
	</form>
	<?php 
		// Check if form is submitted for buku update, then redirect to homepage after update
		if(isset($_POST['update'])){
			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];

			//koneksikan file database
			include_once('connect.php');

			$result = mysqli_query($koneksi, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn'" );


			//Redirect to homepage to display updated user in list
			header("location: index.php");
		}


	?>
</body>
</html>