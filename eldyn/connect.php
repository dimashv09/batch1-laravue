<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}

// ---------- Table Buku ----------
$sql_bukus = "SELECT * FROM bukus";
$result_bukus = $conn->query($sql_bukus);

if ($result_bukus->num_rows > 0) {
	echo "============================== <br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;Buku<br>";
	echo "============================== <br>";
	while ($row = $result_bukus->fetch_assoc()) {
		echo "Buku: " . $row["isbn"] . " " . $row["judul"]. "<br>";
	}
	echo "<br>";
} else {
	echo "0 result";
}

// ---------- Table Anggota ----------
$sql_anggotas = "SELECT * FROM anggotas";
$result_anggotas = $conn->query($sql_anggotas);

if ($result_anggotas->num_rows > 0) {
	echo "============================== <br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;Anggota<br>";
	echo "============================== <br>";
	while ($row = $result_anggotas->fetch_assoc()) {
		echo "Anggota: " . $row["name"] . " " . $row["telp"]. "<br>";
	}
} else {
	echo "0 result";
}
$conn->close();
?>