<?php
    include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<html>

<head>
    <title>Pengarang</title>
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
        <a href="index.php">Pengarang</a> |
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <div class="container">
        <a href="add.php" class="btn btn-primary btn-sm">Tambah Pengarang</a><br /><br />

        <table class="table table-hover">

            <tr>
                <th>Nama Pengarang</th>
                <th>Email</th>
                <th>telpon</th>
                <th>Alamat</th>
            </tr>
            <?php  
        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
            echo "<tr>";
            echo "<td>".$pengarang_data['nama_pengarang']."</td>";
            echo "<td>".$pengarang_data['email']."</td>";
            echo "<td>".$pengarang_data['telp']."</td>";    
            echo "<td>".$pengarang_data['alamat']."</td>";
            echo "<td><a class='btn btn-warning btn-sm'
                    href='edit.php?id_pengarang=$pengarang_data[id_pengarang]'>Ubah</a> | <a
                        class='btn btn-danger btn-sm'
                    href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Hapus</a></td>
            </tr>";
        }
    ?>
        </table>
    </div>
</body>

</html>