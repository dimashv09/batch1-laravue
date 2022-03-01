<?php
require_once("../connect.php");
$id_pengarang = $_GET['id_pengarang'];

$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

while ($data = mysqli_fetch_array($pengarang)) 
{
    # code...
    $id_pengarang = $data['id_pengarang'];
    $nama_pengarang = $data['nama_pengarang'];
    $email = $data['email'];
    $telp = $data['telp'];
    $alamat = $data['alamat'];
}

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


        <form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
            <table class="table table-striped" width="25%" border="2">
                <tr>
                    <td>ID Pengarang</td>
                    <td style="font-size: 11pt;"><?php echo $id_pengarang; ?> </td>
                </tr>
                <tr>
                    <td>Nama Pengarang</td>
                    <td><input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="update"
                            value="Update"></td>
                </tr>
            </table>

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    # code...
    $id_pengarang = $_GET['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($mysqli, "UPDATE pengarang SET id_pengarang='$id_pengarang', nama_pengarang='$nama_pengarang', email='$email', telp='$telp', alamat='$alamat' WHERE id_pengarang='$id_pengarang'");

    header("Location:index.php");
}

?>