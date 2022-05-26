<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
	
?>
<body>

	<div class="card-body">
	<a type="button" class="btn btn-outline-primary" href="index.php">Go to Home</a>
	<br/><br/>
	</div>
		</div>
	<div class="card">
		<div class="card-body">
			<div class="card-header">

	<form action="add.php" method="post" name="form_penerbit">
		<table width="25%" border="0">
			<div class="form-group">
                <tr>
                    <td>ID Penerbit</td>
                    <td><input type="text" name="id_penerbit" class="form-control"></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama_penerbit" class="form-control"></td>
                </tr>
            </div>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" class="form-control"></td>
                </tr>
            <div class="form-group">
                <tr>
                    <td>No Telepon</td>
                    <td><input type="text" name="telp" class="form-control"></td>
                </tr>
            </div>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" class="form-control"></td>
                </tr>
                <tr> 
					<td></td>
					<td class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="Submit" value="Tambah"></td>
				</tr>
            </table>
        </form>
 </div>
       	</div>
       		</div>
        <?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_penerbit = $_POST['id_penerbit'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
			
			header("Location:index.php");
		}
	?>
</body>
</html>