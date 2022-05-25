<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");
?>
<body>

	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form_katalog">
		<table width="25%" border="0">
                <tr>
                    <td>No</td>
                    <td><input type="text" name="id_katalog"></td>
                </tr>
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
				</tr>
            </table>
        </form>

        <?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id_katalog= $_POST['id_katalog'];
			$nama = $_POST['nama'];
			include_once("file:///C:/xampp/htdocs/ria_class_laravel_eduwork/crud_task/connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama');");
			
			header("Location:index.php");
		}
	?>
</body>
</html>