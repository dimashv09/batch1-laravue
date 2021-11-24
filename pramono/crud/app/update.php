<?php
include 'connection.php';

if (isset($_POST['edit-buku'])) {
    $id = $_POST['id'];
    $isbn = htmlspecialchars($_POST['isbn']);
    $judul = htmlspecialchars($_POST['judul']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $katalog = htmlspecialchars($_POST['katalog']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $harga = htmlspecialchars($_POST['harga']);
    $stok = htmlspecialchars($_POST['stok']);

    $sql = "UPDATE bukus SET isbn='$isbn', judul='$judul', tahun='$tahun', id_penerbit='$penerbit', id_pengarang='$pengarang', id_katalog='$katalog', qty_stok='$stok',harga_pinjam='$harga'  WHERE id='$id'";
    $update = mysqli_query($conn, $sql);

    if ($update) {
        $_SESSION['notification'] = "Data Berhasil diubah";
        header('Location:../content/buku.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/buku.php');
    }
}

if (isset($_POST['edit-penerbit'])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $sql = "UPDATE penerbits SET nama_penerbit='$nama', email='$email', telp='$telepon', alamat='$alamat' WHERE id='$id'";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        $_SESSION['notification'] = "Data Berhasil diubah";
        header('Location:../content/penerbit.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/penerbit.php');
    }
}

if (isset($_POST['edit-pengarang'])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $sql = "UPDATE pengarangs SET nama_pengarang='$nama', email='$email', telp='$telepon', alamat='$alamat' WHERE id='$id'";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        $_SESSION['notification'] = "Data Berhasil diubah";
        header('Location:../content/pengarang.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/pengarang.php');
    }
}

if (isset($_POST['edit-katalog'])) {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);

    $sql = "UPDATE katalogs SET nama='$nama' WHERE id='$id'";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        $_SESSION['notification'] = "Data Berhasil diubah";
        header('Location:../content/katalog.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/katalog.php');
    }
}