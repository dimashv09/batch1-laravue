<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<html>

<head>
    <title>Penerbit</title>
</head>

<body>

    <center>
        <a href="../index.php">Buku</a> |
        <a href="penerbit/index.php">Penerbit</a> |
        <a href="../pengarang/index.php">Pengarang</a> |
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Tambah Penerbit</a><br /><br />

    <table width='80%' border=1>

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
            echo "<td><a href='edit.php?id_penerbit=$penerbit_data[id_penerbit]'>Ubah</a> | <a href='delete.php?id_penerbit=$penerbit_data[id_penerbit]'>Hapus</a></td></tr>";        
        }
    ?>
    </table>
</body>

</html>