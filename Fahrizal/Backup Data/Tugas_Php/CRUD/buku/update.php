<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
</head>

<?php
include_once("../connect.php");
$isbn = $_GET['isbn'];

$buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

while ($buku_data = mysqli_fetch_array($buku)) {
    $judul = $buku_data['judul'];
    $isbn = $buku_data['isbn'];
    $tahun = $buku_data['tahun'];
    $id_penerbit = $buku_data['id_penerbit'];
    $id_pengarang = $buku_data['id_pengarang'];
    $id_katalog = $buku_data['id_katalog'];
    $qty_stok = $buku_data['qty_stok'];
    $harga_pinjam = $buku_data['harga_pinjam'];
}
?>

<body>
    <a href="index.php">Go Home</a>
    <form action="update.php?isbn=<?php echo $isbn; ?>" method="post">
        <label>Judul</label>
        <input type="text" name="judul" value="<?php echo $judul; ?>">
        <br>
        <label>Tahun</label>
        <input type="text" name="tahun" value="<?php echo $tahun; ?>">
        <br>
        <label>Penerbit</label>
        <select name="id_penerbit">
            <?php
            while ($penerbit_data = mysqli_fetch_array($penerbit)) {
                echo "<option" . ($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '') . " value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label>Pengarang</label>
        <select name="id_pengarang">
            <?php
            while ($pengarang_data = mysqli_fetch_array($pengarang)) {
                echo "<option " . ($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '') . " value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label>Katalog</label>
        <select name="id_katalog">
            <?php
            while ($katalog_data = mysqli_fetch_array($katalog)) {
                echo "<option " . ($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '') . "value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
            }
            ?>
        </select>
        <br>
        <label>Qty Stok</label>
        <input type="text" name="qty_stok" value="<?php echo $qty_stok; ?>">
        <br>
        <label>Harga Pinjam</label>
        <input type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>"><br>
        <input type="submit" name="update">
    </form>

    <?php

    if (isset($_POST['update'])) {

        $isbn = $_GET['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_pengarang'];
        $tahun = $_POST['id_penerbit'];

        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        include_once("connect.php");

        $result = mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");

        header("Location:index.php");
    }

    ?>

</body>

</html>