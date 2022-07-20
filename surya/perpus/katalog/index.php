<?php
    include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<html>

<head>
    <title>Katalog</title>
</head>

<body>

    <center>
        <a href="../index.php">Buku</a> |
        <a href="../penerbit/index.php">Penerbit</a> |
        <a href="../pengarang/index.php">Pengarang</a> |
        <a href="katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="add.php">Tambah katalog</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>Nama katalog</th>
            <th>Email</th>
        </tr>
        <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['nama']."</td>";
            echo "<td><a href='edit.php?id_katalog=$katalog_data[id_katalog]'>Ubah</a> | <a href='delete.php?id_katalog=$katalog_data[id_katalog]'>Hapus</a></td></tr>";        
        }
    ?>
    </table>
</body>

</html>