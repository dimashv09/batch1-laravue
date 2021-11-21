<?php

// configuration
$host = "localhost";
$user = "root";
$pass = "";
$db = "perpustakaan";

// create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// check connection
if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error());
}

$sql = "SELECT * FROM bukus";
$result = $conn->query($sql);

// check result
if ($result->num_rows > 0) {
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        echo '<h1>' . $i++ . '.buku : ' . $row['judul'] . 'telah di rilis di tahun : ' . $row['tahun'] . '<br></h1>';
    }
} else {
    echo "0 results";
}
