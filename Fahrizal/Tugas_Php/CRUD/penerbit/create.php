<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Penerbit</title>
</head>

<body>
    <a href="index.php">Go Home</a>
    <form action="create.php" method="post" name="form1">
        <table width="25%" border="0">

            <label>Nama Penerbit</label>
            <input type="text" name="nama_penerbit">

            <label>email</label>
            <input type="email" name="email">

            <label>No Telepon</label>
            <input type="number" name="telp">

            <label>Alamat</label>
            <input type="text" name="alamat">

            <input type="submit" name="Submit">
        </table>
    </form>
</body>
<?php

if (isset($_POST['Submit'])) {
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    include_once("../buku/connect.php");

    $result = mysqli_query($mysqli, "INSERT INTO penerbit (nama_penerbit,email,telp,alamat) VALUES ('$nama_penerbit','$email','$telp','$alamat');");

    header("Location:index.php");
}

?>

</html>