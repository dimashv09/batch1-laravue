<html>

<head>
    <title>tambah Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</head>

<?php
	include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<body>
    <div class="container">
        <a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
        <br /><br />

        <form action="add.php" method="post" name="form1">
            <?php
            $id_penerbit = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id_penerbit) AS total FROM penerbit"));
            $no = $id_penerbit['total'];
            $no = $no + 1;
            $id_penerbitFix = "";
            if($id_penerbit['total'] < 1){ 
                $id_penerbitFix="PN01" ; 
            }else if($id_penerbit['total'] < 10){ 
                $id_penerbitFix="PN0" .$no;
            }else if($id_penerbit['total'] < 100){
                $id_penerbitFix="PN" .$no;
            }

            if(isset($_POST['Submit'])) {
                $id_penerbit   = $_POST['id_penerbit'];
                $nama_penerbit = $_POST['nama_penerbit'];
                $email         = $_POST['email'];
                $telp          = $_POST['telp'];
                $alamat        = $_POST['alamat'];
                
                include_once("connect.php");

                $result = mysqli_query($mysqli, "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`)
                VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat');");
                
                header("Location:index.php");
            }
        ?>
            <table width="50%" border="0">
                <tr>
                    <td>ID Penerbit</td>
                    <td><input type="text" class="form-control" name="id_penerbit" value="<?=$id_penerbitFix;?>"></td>
                </tr>
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" class="form-control" name="nama_penerbit"></td>
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