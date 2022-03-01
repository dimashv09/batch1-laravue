<?php
require_once("../connect.php");

$buku = mysqli_query($mysqli, "SELECT *, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku
                        LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
                        LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                        LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                        ORDER BY judul ASC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Buku</a>
                    <a class="nav-link" href="../penerbit/index.php">Penerbit</a>
                    <a class="nav-link" href="../pengarang/index.php">Pengarang</a>
                    <a class="nav-link" href="../katalog/index.php">Katalog</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <a class="btn btn-primary" href="create.php">Add New Buku</a>
        <br><br>

        <table class="table table-striped table-bordered" width='80%' border=1>
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Katalog</th>
                <th>Stok</th>
                <th>Harga Pinjam</th>
                <th>Aksi</th>
            </tr>
            <?php  
        while($buku_data = mysqli_fetch_array($buku)) :
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a href='edit.php?isbn=$buku_data[isbn]'class='btn btn-info'>Edit</a>
            <a href='delete.php?isbn=$buku_data[isbn]'class='btn btn-danger'>Delete</a></td></tr>";        
        endwhile;
        ?>
        </table>
    </div>

</body>

</html>