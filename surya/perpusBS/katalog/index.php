<?php
    include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>

<head>
    <title>Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</head>

<body>

    <center>
        <a href="../index.php">Buku</a> |
        <a href="../penerbit/index.php">Penerbit</a> |
        <a href="../pengarang/index.php">Pengarang</a> |
        <a href="katalog/index.php">Katalog</a>
        <hr>
    </center>

    <div class="container">
        <a href="add.php" class="btn btn-primary btn-sm">Tambah Katalog</a><br /><br />

        <table class="table table-hover">

            <tr>
                <th>Nama Katalog</th>
                <th>Email</th>
            </tr>
            <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['nama']."</td>";
            echo "<td><a class='btn btn-warning btn-sm' href='edit.php?id_katalog=$katalog_data[id_katalog]'>Ubah</a> |
                <a class='btn btn-danger btn-sm' href='delete.php?id_katalog=$katalog_data[id_katalog]'>Hapus</a></td>
            </tr>";
        }
    ?>
        </table>
    </div>
</body>

</html>