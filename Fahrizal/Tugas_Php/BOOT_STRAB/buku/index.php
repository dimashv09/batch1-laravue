<?php

include_once("../connect.php");
$buku = mysqli_query($mysqli, "SELECT buku.*, nama_pengarang,nama_penerbit, katalog.nama as nama_katalog from buku LEFT JOIN pengarang ON pengarang.id_pengarang=buku.id_pengarang LEFT JOIN penerbit ON penerbit.id_penerbit=buku.id_penerbit LEFT JOIN katalog ON katalog.id_katalog=buku.id_katalog ORDER BY judul ASC");

?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <br /><br />
                <center>
                    <a href="../buku/index.php"><button type="button" class="btn btn-success">Buku</button>
                        <a href="../penerbit/index.php"><button type="button" class="btn btn-danger">Penerbit</button>
                            <a href="../pengarang/index.php"><button type="button"
                                    class="btn btn-dark">Pengarang</button>
                                <a href="../katalog/index.php"><button class="btn btn-primary"
                                        type="submit">Katalog</button>

                </center>
                <BR /><BR />
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-outline-primary" href="create.php">Add New Buku</a><br><br>

                        <table class="table" border="2">
                            <tr class="table-primary">
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
                            while ($buku_data = mysqli_fetch_array($buku)) {
                                echo "<tr>";
                                echo "<td >" . $buku_data['isbn'] . "</td>";
                                echo "<td>" . $buku_data['judul'] . "</td>";
                                echo "<td>" . $buku_data['tahun'] . "</td>";
                                echo "<td>" . $buku_data['nama_pengarang'] . "</td>";
                                echo "<td>" . $buku_data['nama_penerbit'] . "</td>";
                                echo "<td>" . $buku_data['nama_katalog'] . "</td>";
                                echo "<td>" . $buku_data['qty_stok'] . "</td>";
                                echo "<td>" . $buku_data['harga_pinjam'] . "</td>";
                                echo "<td><a class='btn btn-primary btn-sm'  href='update.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger btn-sm' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>