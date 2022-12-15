<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Pengarang</title>

</head>

<body>

    <a href="index.php">Go Home</a>

    <form action="create.php" method="post" name="form1">
        <table>

            <label>Nama Pengarang</label>
            <input type="text" name="nama_pengarang">
            <br /><br />

            <label>Email</label>
            <input type="email" name="email">
            <br /><br />

            <label>No Telepon</label>
            <input type="number" name="telp">
            <br /><br />

            <label>Alamat</label>
            <input type="text" name="alamat">
            <br /><br />

            <input type="submit" name="Submit">
            </div>
        </table>
    </form>
    </div>
    </div>
    </div>
</body>
<?php

if (isset($_POST['Submit'])) {
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    include_once("../buku/connect.php");

    $result = mysqli_query($mysqli, "INSERT INTO pengarang (nama_pengarang,email,telp,alamat) VALUES ('$nama_pengarang','$email','$telp','$alamat');");

    header("Location:index.php");
}

?>

</html>