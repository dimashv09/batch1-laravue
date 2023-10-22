<?php
//include database connection file
include_once("connect.php");

//get id from url to delete that buku
$isbn = $_GET['isbn'];

//delete buku row buku from table based on given id
$result1 = mysqli_query($koneksi, "DELETE FROM detail_peminjaman WHERE isbn = '$isbn'");
$result2 = mysqli_query($koneksi, "DELETE FROM buku WHERE isbn = '$isbn'");

//after delete redirect to home, so that latest buku list will be displayed
header("Location: index.php");

// if ($result1 && $result2) {
//     echo "Data berhasil dihapus";
// } else {
//     echo "Error: " . mysqli_error($koneksi);
// }

?>