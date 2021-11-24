<?php 
include "connection.php";

if (isset($_POST['buku-baru'])) {
    $isbn = htmlspecialchars($_POST['isbn']);
    $judul = htmlspecialchars($_POST['judul']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $katalog = htmlspecialchars($_POST['katalog']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $harga = htmlspecialchars($_POST['harga']);
    $stok = htmlspecialchars($_POST['stok']);

    $sql = "INSERT INTO bukus (isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam) VALUES 
    ('$isbn', '$judul', '$tahun', '$penerbit', '$pengarang', '$katalog', '$stok', '$harga')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['notification'] = "Data Berhasil ditambahkan";
        header('Location:../content/buku.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/buku.php');
    }
}

if (isset($_POST['penerbit-baru'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $sql = "INSERT INTO penerbits (nama_penerbit, email, telp, alamat) VALUES
            ('$nama','$email','$telepon','$alamat')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['notification'] = "Data Berhasil ditambahkan";
        header('Location:../content/penerbit.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/penerbit.php');
    }
}

if (isset($_POST['pengarang-baru'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $sql = "INSERT INTO pengarangs (nama_pengarang, email, telp, alamat) VALUES
            ('$nama','$email','$telepon','$alamat')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['notification'] = "Data Berhasil ditambahkan";
        header('Location:../content/pengarang.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/pengarang.php');
    }
    
}

if (isset($_POST['katalog-baru'])) {
    $nama = htmlspecialchars($_POST['nama']);

    $sql = "INSERT INTO katalogs (nama) VALUES
            ('$nama')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['notification'] = "Data Berhasil ditambahkan";
        header('Location:../content/katalog.php');
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/katalog.php');
    }
    
}


