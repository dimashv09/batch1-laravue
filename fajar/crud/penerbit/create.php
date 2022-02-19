<?php
require_once("../connect.php");

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");

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


    <form action="create.php" method="post">
        <table width="25%" border="0">
            <tr>
                <td>ID Penerbit</td>
                <td><input type="text" name="id_penerbit"></td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="nama_penerbit"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td><input type="text" name="telp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
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
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat= $_POST['alamat'];

    $result = mysqli_query($mysqli, "INSERT INTO `penerbit`(`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUE ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");

    header("Location:index.php");
}

?>