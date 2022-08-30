<html>

<head>
    <title>Tambah Katalog</title>
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
    <a href="index.php">Kembali</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
        <?php
            $id_katalog = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(id_katalog) AS total FROM katalog"));
            $no = $id_katalog['total'];
            $no = $no + 1;
            $id_katalogFix = "";
            if($id_katalog['total'] < 1){ 
                $id_katalogFix="KG01" ; }
            else if($id_katalog['total'] < 10){
                $id_katalogFix="KG" .$no; 
            }
                
            if(isset($_POST['Submit'])) {
                $id_katalog = $_POST['id_katalog'];
                $nama       = $_POST['nama'];
                
                include_once("../connect.php");

                $result = mysqli_query($mysqli, "INSERT INTO `katalog` (`id_katalog`, `nama`)
                VALUES ('$id_katalog', '$nama');");
                
                header("Location:index.php");
            }
        ?>
        <table width="25%" border="0">
            <tr>
                <td>ID Katalog</td>
                <td><input type="text" name="id_katalog" value="<?=$id_katalogFix;?>"></td>
            </tr>
            <tr>
                <td>Nama Katalog</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>


</body>

</html>