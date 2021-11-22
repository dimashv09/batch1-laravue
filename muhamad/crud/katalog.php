<?php
include_once("connect.php");
$katalog = mysqli_query($conn, "SELECT * FROM katalogs ORDER BY id ASC");

?>

<html>

<head>
    <title>Perpustakaan | Data Katalog</title>
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
                    <a class="nav-link" href="pengarang.php">Pengarang</a>
                    <a class="nav-link active" aria-current="page" href="katalog.php">Katalog</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="addKt.php" class="btn btn-primary mb-3">Add New Katalog</a>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Nama</th>

                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($k = mysqli_fetch_assoc($katalog)) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td class='text-center'>" . $k['nama'] . "</td>";

                    echo "<td class='d-flex justify-content-center'><a class='btn btn-primary mr-2' href='editKt.php?id=$k[id]'>Edit</a> | <a onclick='return confirm(`Yakin?`)' class='btn btn-danger ml-2' href='deleteKt.php?id=$k[id]'>Delete</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>