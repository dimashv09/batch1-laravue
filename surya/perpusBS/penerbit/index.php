<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<html>

<head>
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</head>

<body>

    <center>
        <a href="../index.php">Buku</a> |
        <a href="penerbit/index.php">Penerbit</a> |
        <a href="../pengarang/index.php">Pengarang</a> |
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <div class="container">
        <a href="add.php" class="btn btn-primary btn-sm">Tambah Penerbit</a><br /><br />

        <table class="table table-hover">

            <tr>
                <th>Nama Penerbit</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
            <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";
            echo "<td><a class='btn btn-warning btn-sm' href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Ubah</a>
                | <a class='btn btn-danger btn-sm' href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Hapus</a>
                </td>
            </tr>";
        }
    ?>
        </table>
    </div>
</body>

</html>