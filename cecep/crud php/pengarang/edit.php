<?php
include_once('connect.php');

if(isset($_POST['update'])){
  $id_pengarang = $_GET['id_pengarang'];
  $nama = $_POST['nama_pengarang'];

  $result = mysqli_query($mysqli, "UPDATE pengarang SET nama_pengarang = '$nama' WHERE id_pengarang = '$id_pengarang'");

    header('Location: index.php');
}

$id_pengarang = $_GET['id_pengarang'];
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang'");
$data = mysqli_fetch_assoc($pengarang);
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

  <form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" style="color:black;" method="POST">
    <table>
      <tr>
        <td>ID pengarang</td>
        <td style="font-size:11pt"><?php echo $id_pengarang?></td>     
      </tr>
      <tr>
        <td>Nama pengarang</td>
        <td><input type="text" name="nama_pengarang" value="<?php echo $data['nama_pengarang']; ?>" style="color:black;"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="update" value="Simpan" style="color:black;"></td>
      </tr>
    </table>
  </form>
</body>
</html>