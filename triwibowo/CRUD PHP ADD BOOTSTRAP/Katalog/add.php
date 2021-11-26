<html>
<head>
<title>Tambah Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
<div class="container jumbotron">
<a href="index.php"><button class="btn btn-primary mt-4 mb-2">Go to Home</button></a>
	

<div class="card text-center">
  <div class="card-header">
    Masukan Detail Katalog
  </div>
  <div class="card-body">
<form action="add.php" method="post" name="form1">
		<table width="25%" class="table table-striped" border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr> 
				<td></td>
				<td><input class="btn btn-success" type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	<div class="card-footer text-muted">
	  Terimakasih
  </div>
</div>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalogs` (`nama`) VALUES ('$nama');");
			
			header("Location:index.php");
		}
	?>
</div>
</body>
</html>