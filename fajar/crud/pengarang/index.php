<?php
require_once("../connect.php");

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="#">Penerbit</a> |
        <a href="#">Pengarang</a> |
        <a href="#">Katalog</a>
        <hr>
    </center>

    <a href="create.php">Add New Pengarang</a><br><br>

    <table width='80%' border=1>
        <tr>
            <th>ID Pengarang</th>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>NO Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php  
        while($data = mysqli_fetch_array($pengarang)) :
            echo "<tr>";
            echo "<td>".$data['id_pengarang']."</td>";
            echo "<td>".$data['nama_pengarang']."</td>";
            echo "<td>".$data['email']."</td>";    
            echo "<td>".$data['telp']."</td>";    
            echo "<td>".$data['alamat']."</td>";   
            echo "<td><a href='edit.php?id_pengarang=$data[id_pengarang]'>Edit</a> | <a href='delete.php?id_pengarang=$data[id_pengarang]'>Delete</a></td></tr>";        
        endwhile;
        ?>
    </table>
</body>

</html>