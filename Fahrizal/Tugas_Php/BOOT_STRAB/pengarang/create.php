<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Pengarang</title>
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
                <a class="btn btn-outline-dark" href="index.php">Go Back</a>
                <a class="btn btn-outline-dark" href="../buku/index.php">Go Home</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="create.php" method="post" name="form1">
                    <table>
                        <div class="form-group">
                            <label>Nama Pengarang</label>
                            <input class="form-control" type="text" name="nama_pengarang">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input class="form-control" type="number" name="telp">
                        </div>
                        <div class="form-group">
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
    $nama_pengarang = $_POST['nama_pengarang'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    include_once("../connect.php");

    $result = mysqli_query($mysqli, "INSERT INTO pengarang (nama_pengarang,email,telp,alamat) VALUES ('$nama_pengarang','$email','$telp','$alamat');");

    header("Location:index.php");
}

?>

</html>