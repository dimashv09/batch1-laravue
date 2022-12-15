<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Katalog</title>

</head>
<?php
include_once("../connect.php");
$id_katalog = $_GET['id_katalog'];
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");

while ($katalog_data = mysqli_fetch_array($katalog)) {
    $nama = $katalog_data['nama'];
}

?>

<body>
    <a href="index.php">Go Home</a>
    <form action="update.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
        <label>Nama</label>
        <input stype="text" name="nama" value="<?php echo $nama; ?>">
        <input type="submit" name="update" value="Update">
    </form>
</body>
<?php

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];

    include_once("../connect.php");

    $result = mysqli_query($mysqli, "UPDATE katalog SET nama='$nama' WHERE id_katalog ='$id_katalog';");
    header("Location:index.php");
}

?>

</html>