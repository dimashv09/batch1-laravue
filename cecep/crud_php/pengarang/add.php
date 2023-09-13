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
include_once('../connect.php');
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");

?>
<body>
<a href="index.php">Back</a></br></br>
	<form action="add.php" method="POST" name="form1">
		<table width="25%" border="0">
            <tr>
                <td>
                    <select name="id_pengarang" style="color: coral;">
                    <?php 
                    while($pengarang_data = mysqli_fetch_assoc($pengarang)) {
                        echo "<option value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['id-pengarang']."</option>"; 
                    }
                    ?>

                </select>
                </td>
            </tr>
            <tr>
            <td>ID Pengarang</td>
				<td><input type="text" style="color: black;" name="id_pengarang"></td>
			</tr>
            <tr>
            <td>Nama Pengarang</td>
				<td><input type="text" style="color: black;" name="nama_pengarang"></td>
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
				<td><input type="submit" style="color:black;" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php 
		if(isset($_POST['Submit'])){
			$id_pengarang = $_POST['id_pengarang'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat']; 
			
			
			//get database connection
			include_once('../connect.php');
	 
			//push data on the table
			$hasil = mysqli_query($mysqli, "INSERT INTO pengarang(id_pengarang, nama_pengarang, email, telp, alamat) 
											VALUES ('$id_pengarang','$nama_pengarang', '$email', '$telp', '$alamat');
								");
			header('Location: index.php');
		}


	?>
</body>
</html>