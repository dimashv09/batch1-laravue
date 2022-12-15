<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Buku</title>
</head>
</head>

<?php
include_once("../connect.php");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
    <a href="index.php">Go Home</a>
    <form action="create.php" method="post" name="form1">
        <label>ISBN</label>
        <input type="text" name="isbn">
        <br /><br />
        <label>Judul</label>
        <input type="text" name="judul">
        <br /><br />
        <label>Tahun</label>
        <input type="date" name="tahun">
        <br /><br />
        <label>Penerbit</label>
        <select name="id_penerbit">
            <br /><br />
            <?php
            while (
                $penerbit_data =
                mysqli_fetch_array($penerbit)
            ) {
                echo "<option value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
            }
            ?>
        </select>
        <br /><br />
        <label>Pengarang</label>
        <select name="id_pengarang">
            <?php
            while ($pengarang_data = mysqli_fetch_array($pengarang)) {

                echo "<option value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
            }
            ?>
        </select>
        <br /><br />
        <label>Katalog</label>
        <select name="id_katalog">
            <?php
            while ($katalog_data = mysqli_fetch_array($katalog)) {
                echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
            }

            ?>
        </select>
        <br /><br />
        <label>Qty Stok</label>
        <input type="text" name="qty_stok">
        <br /><br />
        <label>Harga Pinjam</label>
        <input type="text" name="harga_pinjam">
        <br /><br />
        <input type="submit" name="Submit">
    </form>

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