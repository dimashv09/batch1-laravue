<html>
<head>    
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	ob_start();
	include_once("connect.php");
	$isbn = $_GET['isbn'];

	$buku = mysqli_query($mysqli, "SELECT * FROM bukus WHERE isbn='$isbn'");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");

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
<div class="container jumbotron">
	<a href="index.php"><button class="btn btn-primary mt-4 mb-2">Go to Home</button></a>
	
<div class="card text-center">
  <div class="card-header">
    Edit Buku
  </div>
  <div class="card-body">
	<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
		<table class ="table table-striped" width="25%" border="0">
			<tr> 
				<td>ISBN</td>
				<td style="font-size: 11pt;"><?php echo $isbn; ?> </td>
			</tr>
			<tr> 
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $judul; ?>" required></td>
			</tr>
			<tr> 
				<td>Tahun</td>
				<td><input type="text" name="tahun" value="<?php echo $tahun; ?>" required></td>
			</tr>
			<tr> 
				<td>Penerbit</td>
				<td>
					<select name="id_penerbit">
						<?php 
						    while($penerbit_data = mysqli_fetch_array($penerbit)) {         
						    	echo "<option ".($penerbit_data['id'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id']."'>".$penerbit_data['nama_penerbit']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Pengarang</td>
				<td>
					<select name="id_pengarang">
						<?php 
						    while($pengarang_data = mysqli_fetch_array($pengarang)) {         
						    	echo "<option ".($pengarang_data['id'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id']."'>".$pengarang_data['nama_pengarang']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Katalog</td>
				<td>
					<select name="id_katalog">
						<?php 
						    while($katalog_data = mysqli_fetch_array($katalog)) {         
						    	echo "<option ".($katalog_data['id'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id']."'>".$katalog_data['nama']."</option>";
						    }
						?>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Qty Stok</td>
				<td><input type="text" name="qty_stok" value="<?php echo $qty_stok; ?>" required></td>
			</tr>
			<tr> 
				<td>Harga Pinjam</td>
				<td><input type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class = "btn btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
  <div class="card-footer text-muted">
	  Terimakasih
  </div>
</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE bukus SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>

</div>
</body>
</html>