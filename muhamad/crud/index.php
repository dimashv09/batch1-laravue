<?php
include_once("connect.php");
$buku = mysqli_query($conn, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
                                        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
                                        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
                                        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
                                        ORDER BY judul ASC");

?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Buku</a>
                    <a class="nav-link" href="penerbit.php">Penerbit</a>
                    <a class="nav-link" href="pengarang.php">Pengarang</a>
                    <a class="nav-link" href="katalog.php">Katalog</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="add.php" class="btn btn-primary mb-3">Add New Buku</a>

        <table class="table table-dark table-striped">
            <thead>
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
            </thead>
            <tbody>
                <?php
                while ($buku_data = mysqli_fetch_assoc($buku)) {
                    echo "<tr>";
                    echo "<td>" . $buku_data['isbn'] . "</td>";
                    echo "<td>" . $buku_data['judul'] . "</td>";
                    echo "<td>" . $buku_data['tahun'] . "</td>";
                    echo "<td>" . $buku_data['nama_pengarang'] . "</td>";
                    echo "<td>" . $buku_data['nama_penerbit'] . "</td>";
                    echo "<td>" . $buku_data['nama_katalog'] . "</td>";
                    echo "<td>" . $buku_data['qty_stok'] . "</td>";
                    echo "<td>" . $buku_data['harga_pinjam'] . "</td>";
                    echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a onclick='return confirm(`Yakin?`)' class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>