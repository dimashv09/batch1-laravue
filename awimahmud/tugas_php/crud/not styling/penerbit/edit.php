<?php
//koneksi
include_once('koneksi.php');
//get
$id_penerbit = $_GET['id_penerbit'];

if (isset($_GET['id_penerbit'])) {
    $id_penerbit = $_GET['id_penerbit'];
} else {
    die("ERROR: ID penerbit tidak ditemukan.");
}



//query
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit LEFT JOIN buku ON penerbit.id_penerbit = buku.id_penerbit");
// $buku = mysqli_query($koneksi, "SELECT * FROM buku");
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

// while($data_buku = mysqli_fetch_array($buku)){
// 	$id_penerbit = $data_buku['id_penerbit'];
// 	$judul = $data_buku['judul'];
// 	$tahun = $data_buku['tahun'];
// }

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
	<form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>">
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
				<td>Telpon</td>
				<td><input type="text" name="telp" value="<?php echo $telp?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $judul?>"></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td><input type="text" name="tahun" value="<?php echo $tahun?>"></td>
				<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" style="color:black;"><?php echo $alamat;?></textarea></td>
			</tr>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Simpan"></td>
			</tr>
			
		</table>
	</form>

	<?php
		if(isset($_POST['update'])) {
			$id_penerbit = $_GET['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$alamat = $_POST['alamat'];
		  
			// Update data penerbit
			$update_penerbit = mysqli_query($koneksi, "UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit='$nama_penerbit', email='$email', telp='$telp', alamat='$alamat' WHERE id_penerbit='$id_penerbit'");
		  
			// Update data buku
			$update_buku = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', tahun='$tahun' WHERE id_penerbit='$id_penerbit'");
		  
			if($update_penerbit && $update_buku) {
			  header("Location: index.php");
			} else {
			  echo "Gagal memperbarui data";
			}
		  }

	?>
</body>
</html>