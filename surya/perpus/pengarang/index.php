<?php
    include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<html>

<head>
    <title>Pengarang</title>
</head>

<body>

    <center>
        <a href="../index.php">Buku</a> |
        <a href="../penerbit/index.php">Penerbit</a> |
        <a href="index.php">Pengarang</a> |
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Tambah Pengarang</a><br /><br />

    <table width='80%' border=1>

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
            echo "<td><a href='edit.php?id_pengarang=$pengarang_data[id_pengarang]'>Ubah</a> | <a href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Hapus</a></td></tr>";        
        }
    ?>
    </table>
</body>

</html>