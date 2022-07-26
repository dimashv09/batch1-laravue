<?php 
    $con = mysqli_connect("localhost", "root", "", "perpus");

    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

    $query = "SELECT * FROM buku";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Buku : " .$row['isbn']. " " . $row['judul'] . "<br>";
        }
    } else {
        echo "Oops! No data.";
    }

    $con->close();
?>