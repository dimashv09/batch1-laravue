<?php
require_once("../connect.php");
    $isbn = $_GET['isbn'];

    $buku = mysqli_query($mysqli, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalog");


    while($buku_data = mysqli_fetch_array($buku))
    {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-primary" href="index.php">Go to Home</a>
        <br><br>

        <form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
            <table class="table table-striped" width="25%" border="2">
                <tr>
                    <td>ISBN</td>
                    <td style="font-size: 11pt;"><?php echo $isbn; ?> </td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" value="<?php echo $judul; ?>"></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="number" name="tahun" value="<?php echo $tahun; ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select name="id_penerbit">
                            <?php 
                        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
                                echo "<option ".($penerbit_data['id_penerbit'] == $id_penerbit ? 'selected' : '')." value='".$penerbit_data['id_penerbit']."'>".$penerbit_data['nama_penerbit']."</option>";
                            }
						?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select name="id_pengarang">
                            <?php 
                        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
                                echo "<option ".($pengarang_data['id_pengarang'] == $id_pengarang ? 'selected' : '')." value='".$pengarang_data['id_pengarang']."'>".$pengarang_data['nama_pengarang']."</option>";
                            }
						?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Katalog</td>
                    <td>
                        <select name="id_katalog">
                            <?php 
                        while($katalog_data = mysqli_fetch_array($katalog)) {         
                                echo "<option ".($katalog_data['id_katalog'] == $id_katalog ? 'selected' : '')." value='".$katalog_data['id_katalog']."'>".$katalog_data['nama']."</option>";
                            }
						?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Qty Stok</td>
                    <td><input type="number" name="qty_stok" value="<?php echo $qty_stok; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input type="number" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="px-5"><input class="btn btn-primary mt-2 mb-2" type="submit" name="update"
                            value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php
		if(isset($_POST['update'])) {

			$isbn = $_GET['isbn'];
			$judul = $_POST['judul'];
			$tahun = $_POST['tahun'];
			$id_penerbit = $_POST['id_penerbit'];
			$id_pengarang = $_POST['id_pengarang'];
			$id_katalog = $_POST['id_katalog'];
			$qty_stok = $_POST['qty_stok'];
			$harga_pinjam = $_POST['harga_pinjam'];
			
            //query update
			$result = mysqli_query($mysqli, "UPDATE buku SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit', id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$qty_stok', harga_pinjam = '$harga_pinjam' WHERE isbn = '$isbn';");
			
			header("Location:index.php");
		}
	?>