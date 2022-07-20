<html>

<head>
    <title>Tambah Pengarang</title>
</head>

<?php
	include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<body>
    <a href="index.php">Kembali</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <?php
            $id_pengarang = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id_pengarang) AS total FROM pengarang"));
            $no = $id_pengarang['total'];
            $no = $no + 1;
            $id_pengarangFix = "";
            if($id_pengarang['total'] < 1){ 
                $id_pengarangFix="PG01" ; 
            }else if($id_pengarang['total'] < 10){ 
                $id_pengarangFix="PG0" .$no;
            }else if($id_pengarang['total'] < 100){
                $id_pengarangFix="PG" .$no;
            }

            if(isset($_POST['Submit'])) {
                $id_pengarang   = $_POST['id_pengarang'];
                $nama_pengarang = $_POST['nama_pengarang'];
                $email          = $_POST['email'];
                $telp           = $_POST['telp'];
                $alamat         = $_POST['alamat'];
                
                include_once("connect.php");

                $result = mysqli_query($mysqli, "INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`)
                VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat');");
                
                header("Location:index.php");
            }
        ?>
        <table width="25%" border="0">
            <tr>
                <td>ID Pengarang</td>
                <td><input type="text" name="id_pengarang" readonly value="<?=$id_pengarangFix;?>"></td>
            </tr>
            <tr>
                <td>Nama Pengarang</td>
                <td><input type="text" name="nama_pengarang"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="number" name="telp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>


</body>

</html>