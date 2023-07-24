<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style>
        input{
            margin: 0px;
        }
    </style>
</head>
<?php
include_once('connect.php');
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");


?>
<body>
<a href="index.php">Back</a></br></br>
	<form action="add.php" method="POST" name="form1">
		<table width="25%" border="0">
            <tr>
                <td>
                    <select name="id_penerbit" style="color: coral;">
                    <?php 
                    while($penerbit_data = mysqli_fetch_assoc($penerbit)) {
                        echo "<option value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['id-penerbit']."</option>"; 
                    }
                    ?>

                </select>
                </td>
            </tr>
			<tr>
            <td>ID Penerbit</td>
				<td><input type="text" style="color: black;" name="id_penerbit"></td>
			</tr>
            <tr>
            <td>Nama Penerbit</td>
				<td><input type="text" style="color: black;" name="nama_penerbit"></td>
			</tr>
            <tr>
				<td>Email</td>
				<td><input type="email" style="color:black;" name="email"></td>
			</tr>
		
			<tr>
				<td>telp</td>
				<td><input type="number" st yle="color:black;" name="telp"></td>

			</tr>
				<td>Alamat</td>
				<td><input type="text" style="color:black;" name="alamat"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" style="color:black;" name="submit " value="Save"></td>
			</tr>
		</table>
	</form>

	<?php 
		if(isset($_POST['submit'])){
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat']; 
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			
			//get database connection
			include_once('connect.php');
	 
			//push data on the table
			$hasil = mysqli_query($mysqli, "INSERT INTO penerbit(id_penerbit, nama_penerbit, email, telp, alamat, judul, tahun) 
											VALUES ('$id_penerbit','$nama_penerbit', '$email', '$telp', '$alamat', '$judul', '$tahun');
								");
			header('Location: index.php');
		}


	?>
</body>
</html>