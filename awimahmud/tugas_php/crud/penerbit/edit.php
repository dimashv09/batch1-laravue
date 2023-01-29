<?php
//koneksi
include_once('koneksi.php');
//get
$id_penerbit = $_GET['id_penerbit'];

//query
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id_penerbit = 'id_penerbit'");
$buku = mysqli_query($koneksi, "SELECT * FROM buku ");

//kondisi untuk query data kolom
while($data_penerbit = mysqli_fetch_array($penerbit)){
	$id_penerbit = $data_penerbit['id_penerbit'];
	$nama_penerbit = $data_penerbit['nama_penerbit'];
	$email = $data_penerbit['email'];
	$telp = $data_penerbit['telp'];
	$alamat = $data_penerbit['alamat'];
	$judul = $data_penerbit['judul'];
	$tahun = $data_penerbit['tahun'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>edit data</title>
	<style>
		input{
			color: black ;
		}
	</style>
</head>
<body>
	<a href="index.php">Back</a>
	<br>
	<form action="edit.php?id_penerbit=<?php echo $idi_penerbit ?>">
		<table class="table">
			<tr>
				<td>ID Penerbit</td>	
				<td style="font-size:11pt=<?echo $id_penerbit?>;"><?php echo $id_penerbit?></td>	
			</tr>
			<tr>
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value='<?php echo $nama_penerbit?>'></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email?>"></td>
			</tr>
			<tr>
				<td>Telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $judul?>"></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" name="tahun" value="<?php echo $tahun?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Save" name="update"></td>
			</tr>
		</table>
	</form>

	<?php
		if(isset($_POST['update'])){
		$id_penerbit = $_POST['id_penerbit'];
		$nama_penerbit = $_POST['nama_penerbit'];
		$email = $_POST['email'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$judul = $_POST['judul'];
		$tahun = $_POST['tahun'];
		}

		// ambil koneksi
		include_once('koneksi.php');
		
		//update query
	$hasil = mysqli_query($koneksi, "UPDATE penerbit SET nama_penerbit = '$nama_penrbit', email = '$email', telp = '$alamat', judul = '$judul', tahun = '$tahun' WHERE id_penerbit = '$id_penerbit'");
	header("Location: index.php");
	?>
</body>
</html>