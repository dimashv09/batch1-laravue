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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-primary" href="index.php">Go to Home</a>
        <br><br>


        <form action="create.php" method="post">
            <table class="table table-striped" width="50%" border="2">
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
                    <td class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="Submit"
                            value="Tambah">
                    </td>
                </tr>
            </table>

        </form>
    </div>
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