<html>

<head>
    <title>Tambah Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>
    <div class="container">
        <a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali</a>
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
            <table width="50%" border="0">
                <tr>
                    <td>ID Katalog</td>
                    <td><input type="text" class="form-control" name="id_katalog" value="<?=$id_katalogFix;?>"></td>
                </tr>
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" class="form-control" name="nama"></td>
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