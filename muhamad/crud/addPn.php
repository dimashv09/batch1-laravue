<?php
include_once("connect.php");
$penerbit = mysqli_query($conn, "SELECT * FROM penerbits");

?>
<html>

<head>
    <title>Add Data Penerbit</title>
</head>

<body>
    <a href="penerbit.php">Back</a>
    <br /><br />

    <form action="" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><input type="text" name="telp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Add</button></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        include_once("connect.php");

        $result = mysqli_query($conn, "INSERT INTO `penerbits` VALUES ('', '$nama', '$email', '$telp', '$alamat', '', '');");

        if (mysqli_affected_rows($conn) > 0) {
            header("Location:penerbit.php");
        } else {
            die("Error: " . mysqli_error($conn));
        }
    }
    ?>
</body>

</html>