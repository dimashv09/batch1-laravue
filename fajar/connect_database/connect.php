<?php 

$servername= "localhost";
$database= "perpus";
$username= "root";
$password= "";

//membuat koneksi
$db = mysqli_connect($servername, $username, $password, $database);

if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());

}

// echo "koneksi berhasil";
// mysqli_close($db);

//$sql = "SELECT * FROM anggota";
$sql = "SELECT * FROM buku";
$hasil = $db->query($sql);


if ($hasil->num_rows > 0 ){
    while( $row = $hasil->fetch_assoc()){
        echo "Buku :" . $row["isbn"]. ", " . $row["judul"]. ", " . $row["tahun"]. ", " . $row["qty_stok"].  ", " . $row["harga_pinjam"]. "<br>";
    }
}else {
    echo "0";
}


$db->close();


?>