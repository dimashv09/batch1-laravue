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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-primary" href="index.php">Go to Home</a>
        <br><br>


        <form action="create.php" method="post" name="formtambah">
            <table class="table table-striped" width="50%" border="2">
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
    $id_katalog = $_POST['id_katalog'];
    $nama = $_POST['nama'];

    $result = mysqli_query($mysqli, "INSERT INTO `katalog`(`id_katalog`, `nama`) VALUE ('$id_katalog', '$nama');");

    header("Location:index.php");
}

?>