<html>

<head>
    <title>tambah Penerbit</title>
</head>

<?php
	include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
?>

<body>
    <a href="index.php">Kembali</a>
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
        <table width="25%" border="0">
            <tr>
                <td>ID Penerbit</td>
                <td><input type="text" name="id_penerbit" value="<?=$id_penerbitFix;?>"></td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="nama_penerbit"></td>
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