<?php
include_once("connect.php");
$pengarang = mysqli_query($conn, "SELECT * FROM pengarangs ORDER BY id ASC");

?>

<html>

<head>
    <title>Perpustakaan | Data Pengarang</title>
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
                    <a class="nav-link" href="index.php">Buku</a>
                    <a class="nav-link" href="penerbit.php">Penerbit</a>
                    <a class="nav-link active" aria-current="page" href="pengarang.php">Pengarang</a>
                    <a class="nav-link" href="katalog.php">Katalog</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="addPg.php" class="btn btn-primary mb-3">Add New Pengarang</a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($p = mysqli_fetch_assoc($pengarang)) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . $p['nama_pengarang'] . "</td>";
                    echo "<td>" . $p['email'] . "</td>";
                    echo "<td>" . $p['telp'] . "</td>";
                    echo "<td>" . $p['alamat'] . "</td>";

                    echo "<td><a class='btn btn-primary' href='editPg.php?id=$p[id]'>Edit</a> | <a onclick='return confirm(`Yakin?`)' class='btn btn-danger' href='deletePg.php?id=$p[id]'>Delete</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>