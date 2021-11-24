<?php 
include 'connection.php';

if (isset($_GET['penerbit'])) {
    $id = $_GET['penerbit'];
    $sql = "DELETE FROM penerbits WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('Location:../content/penerbit.php');
        $_SESSION['notification'] = "Data Berhasil dihapus";
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/penerbit.php');
    }
}

if (isset($_GET['pengarang'])) {
    $id = $_GET['pengarang'];
    $sql = "DELETE FROM pengarangs WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('Location:../content/pengarang.php');
        $_SESSION['notification'] = "Data Berhasil dihapus";
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/pengarang.php');
    }
}

if (isset($_GET['katalog'])) {
    $id = $_GET['katalog'];
    $sql = "DELETE FROM katalogs WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('Location:../content/katalog.php');
        $_SESSION['notification'] = "Data Berhasil dihapus";
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/katalog.php');
    }
}

if (isset($_GET['buku'])) {
    $id = $_GET['buku'];
    $sql = "DELETE FROM bukus WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('Location:../content/buku.php');
        $_SESSION['notification'] = "Data Berhasil dihapus";
    } else {
        $_SESSION['notification'] = "Proccess failed! ". mysqli_error($conn);
        header('Location:../content/buku.php');
    }
}
