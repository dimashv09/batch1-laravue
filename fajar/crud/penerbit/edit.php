<?php
require_once("../connect.php");
$id_penerbit = $_GET['id_penerbit'];

$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

while ($data = mysqli_fetch_array($penerbit)) 
{
    # code...
    $id_penerbit = $data['id_penerbit'];
    $nama_penerbit = $data['nama_penerbit'];
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
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br><br>


    <form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
        <table width="25%" border="0">
            <tr>
                <td>ID Penerbit</td>
                <td style="font-size: 11pt;"><?php echo $id_penerbit; ?> </td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
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
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>

    </form>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    # code...
    $id_penerbit = $_GET['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($mysqli, "UPDATE penerbit SET id_penerbit='$id_penerbit', nama_penerbit='$nama_penerbit', email='$email', telp='$telp', alamat='$alamat' WHERE id_penerbit='$id_penerbit'");

    header("Location:index.php");
}

?>