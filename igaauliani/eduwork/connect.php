<?php 
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}
// echo "connected successfully";
// mysqli_close($conn);

$sql = "SELECT * FROM  buku";
$result = $conn->query($sql);
//
if ($result->num_rows > 0) {
    //input data
    while ($row = $result->fetch_assoc()) {
        echo "buku :" . $row["isbn"] ."". $row["judul"]. "<br>";
    }
}else {
    echo " 0 results";
}
$conn->close();

?>