<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-dark" href="index.php">Back</a>
                <a class="btn btn-outline-dark" href="../buku/index.php">Go Home</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="update.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                    </div>
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