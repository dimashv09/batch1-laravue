<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);


//check connection
if (!$conn) {
	die("connection failed: " . mysqli_connect_error());
}

//echo "connected successfully";
//mysqli_close($conn);

//Query

$sql = "SELECT * FROM 'buku'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "buku : " . $row["isbn"]. " " . $row["judul"]. "<br>";
	}
} else {
	echo "0 results";
}
$conn->close();




?>