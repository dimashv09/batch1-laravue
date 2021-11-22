<?php
include_once("connect.php");
$katalog = mysqli_query($conn, "SELECT * FROM katalogs");

?>
<html>

<head>
    <title>Add Data Katalog</title>
</head>

<body>
    <a href="katalog.php">Back</a>
    <br /><br />

    <form action="" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama katalog</td>
                <td><input type="text" name="nama"></td>
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

        include_once("connect.php");

        $result = mysqli_query($conn, "INSERT INTO `katalogs` VALUES ('', '$nama', '', '');");

        if (mysqli_affected_rows($conn) > 0) {
            header("Location:katalog.php");
        } else {
            die("Error: " . mysqli_error($conn));
        }
    }
    ?>
</body>

</html>