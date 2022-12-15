<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Penerbit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-dark" href="index.php">Back</a>
                <a class="btn btn-outline-dark" href="../buku/index.php">Home</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="create.php" method="post" name="form1">
                    <table width="25%" border="0">
                        <div class="form-group">
                            <label>Nama Penerbit</label>
                            <input class="form-control" type="text" name="nama_penerbit">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div>
                            <label>No Telepon</label>
                            <input class="form-control" type="number" name="telp">
                        </div>
                        <div>
                            <label>Alamat</label>
                            <input class="form-control" type="text" name="alamat">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Submit">
                        </div>
                    </table>
                </form>
            </div>
        </div>
    </div>
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