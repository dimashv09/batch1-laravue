<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// create conection
$conn = mysqli_connect($servername, $username, $password, $database);

// chek connection
if (!$conn){
    die("connection failed: " . mysqli_connect_error());
} 

// echo "connected successfully";
// mysqli_close($conn);

$sql = "SELECT * from buku JOIN anggota";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
//output data of each row
while($row = $result->fetch_assoc()) {
    echo "buku: " . $row["isbn"]. " " . $row["judul"]. " " . $row["id_penerbit"]. " " . $row["qty_stok"]. " " . $row["id_pengarang"]. "<br>" . "<br>";

    echo "anggota: " . $row["id_anggota"]. " " . $row["nama"]. " " . $row["telp"]. "<br>";
} 
} else {
    echo "0 result";
}
$conn->close();

?>
