<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if(!$conn){
 die("Connection Failed: " . mysqli_connect_error());
}
?>
    <div class="container mt-5">
    <h1>TABLE ANGGOTA</h1>
	<table class="table table-striped">
		<tr>
			<th>Nama</th>
			<th>EMAIL</th>
			<th>Alamat</th>
		</tr>
		<?php 
		$sql = "SELECT * FROM anggotas WHERE NOT EXISTS (SELECT id FROM users WHERE users.id_anggota = anggotas.id)";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
            // Output data dari setiap row
            while($row = $result->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['alamat']; ?></td>
			</tr>
			<?php 
		}
        }
		?>
	</table>
    </div>

    <div class="container mt-5">
    <h1>TABLE BUKU</h1>
	<table class="table table-striped">
		<tr>
			<th>ISBN</th>
			<th>JUDUL</th>
			<th>TAHUN</th>
            <th>HARGA</th>
		</tr>
		<?php 
		$sql = "SELECT * FROM bukus";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
            // Output data dari setiap row
            while($row = $result->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $row['isbn']; ?></td>
				<td><?php echo $row['judul']; ?></td>
				<td><?php echo $row['tahun']; ?></td>
                <td><?php echo $row['harga_pinjam']; ?></td>
			</tr>
			<?php 
		}
        }
		?>
	</table>
    </div>
        
</body>
</html>
