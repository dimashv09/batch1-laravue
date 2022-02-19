<?php
require_once("../connect.php");

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

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

    <a href="create.php">Add New Katalog</a><br><br>

    <table width='80%' border=1>
        <tr>
            <th>ID Katalog</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php  
        while($data = mysqli_fetch_array($katalog)) :
            echo "<tr>";
            echo "<td>".$data['id_katalog']."</td>";
            echo "<td>".$data['nama']."</td>";   
            echo "<td><a href='edit.php?id_katalog=$data[id_katalog]'>Edit</a> | <a href='delete.php?id_katalog=$data[id_katalog]'>Delete</a></td></tr>";        
        endwhile;
        ?>
    </table>

</body>

</html>