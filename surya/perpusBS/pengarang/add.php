<html>

<head>
    <title>Tambah Pengarang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</head>

<?php
	include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
?>

<body>
    <div class="container">
        <a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
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
            <table width="50%" border="0">
                <tr>
                    <td>ID Pengarang</td>
                    <td><input type="text" name="id_pengarang" readonly value="<?=$id_pengarangFix;?>"></td>
                </tr>
                <tr>
                    <td>Nama Pengarang</td>
                    <td><input type="text" class="form-control" name="nama_pengarang"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" name="email"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="number" class="form-control" name="telp"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="form-control" name="alamat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary btn-sm" name="Submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>


</body>

</html>