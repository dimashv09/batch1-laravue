<?php
include_once('../connect.php');

if(isset($_POST['update'])){
  $id_penerbit = $_GET['id_penerbit'];
  $nama = $_POST['nama_penerbit'];

  $result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit = '$nama' WHERE id_penerbit = '$id_penerbit'");

    header('Location: index.php');
}

$id_penerbit = $_GET['id_penerbit'];
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'");
$data = mysqli_fetch_assoc($penerbit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
</head>
<body>
  <a href="index.php">Back</a>
  <br><br>

  <form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" style="color:black;" method="POST">
    <table>
      <tr>
        <td>ID Penerbit</td>
        <td style="font-size:11pt"><?php echo $id_penerbit?></td>     
      </tr>
      <tr>
        <td>Nama Penerbit</td>
        <td><input type="text" name="nama_penerbit" value="<?php echo $data['nama_penerbit']; ?>" style="color:black;"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="update" value="Simpan" style="color:black;"></td>
      </tr>
    </table>
  </form>
</body>
</html>