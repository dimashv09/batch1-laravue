<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>
</head>

<?php
include_once("../connect.php");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-dark" href="index.php">Go Home</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="create.php" method="post" name="form1">
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" name="isbn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="date" name="tahun" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <select class="form-select" name="id_penerbit">
                            <?php
                            while (
                                $penerbit_data =
                                mysqli_fetch_array($penerbit)
                            ) {
                                echo "<option value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>pengarang</label>
                        <select class="form-select" name="id_pengarang">
                            <?php
                            while ($pengarang_data = mysqli_fetch_array($pengarang)) {

                                echo "<option value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Katalog</label>
                        <select class="form-select" name="id_katalog">
                            <?php
                            while ($katalog_data = mysqli_fetch_array($katalog)) {
                                echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Qty Stok</label>
                        <input type="text" name="qty_stok" class="form-control">
                    </div>
                    <div>
                        <label>Harga Pinjam</label>
                        <input type="text" name="harga_pinjam" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input class="btn btn-info" type="submit" name="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['Submit'])) {
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        include_once("../connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO buku (isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");

        header("Location:index.php");
    }

    ?>
</body>

</html>