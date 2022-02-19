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
    <a href="index.php">Go to Home</a>
    <br><br>


    <form action="create.php" method="post" name="formtambah">
        <table width="25%" border="0">
            <tr>
                <td>ID Katalog</td>
                <td><input type="text" name="id_katalog"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="add"></td>
            </tr>
        </table>

    </form>
</body>

</html>

<?php

if (isset($_POST['Submit'])) {
    # code...
    $id_katalog = $_POST['id_katalog'];
    $nama = $_POST['nama'];

    $result = mysqli_query($mysqli, "INSERT INTO `katalog`(`id_katalog`, `nama`) VALUE ('$id_katalog', '$nama');");

    header("Location:index.php");
}

?>