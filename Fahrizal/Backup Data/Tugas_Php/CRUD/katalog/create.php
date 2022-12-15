<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Katalog</title>
</head>

<body>
    <a class="btn btn-primary" href="index.php">Go Home</a>
    <form action="create.php" method="post" name="form1">
        <label>Nama Katalog</label>
        <input type="text" name="nama">
        <input type="submit" name="Submit">
    </form>
</body>
<?php
if (isset($_POST['Submit'])) {
    $nama = $_POST['nama'];

    include_once("../connect.php");

    $result = mysqli_query($mysqli, "INSERT INTO katalog (nama) VALUES ('$nama');");

    header("Location:index.php");
}

?>

</html>