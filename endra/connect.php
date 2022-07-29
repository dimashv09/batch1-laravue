<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed :" . mysqli_connect_error());
}

//echo "Endra Dwi Jamaludin";
//mysqli_close($conn);

$sql = "SELECT isbn, judul, tahun, nama_penerbit, email
        FROM buku
        JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Buku : " . $row["isbn"]. "   " . $row["judul"]. "   ".  $row["tahun"] . "   " . $row["nama_penerbit"]. "   " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>