<?php
include_once('../connect.php');

if(isset($_POST['update'])){
  $id_katalog = $_GET['id_katalog'];
  $nama = $_POST['nama'];

  $result = mysqli_query($mysqli, "UPDATE katalog SET nama = '$nama' WHERE id_katalog = '$id_katalog'");

    header('Location: index.php');
}

$id_katalog = $_GET['id_katalog'];
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog'");
$data = mysqli_fetch_assoc($katalog);
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

  <form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" style="color:black;" method="POST">
    <table>
      <tr>
        <td>ID Katalog</td>
        <td style="font-size:11pt"><?php echo $id_katalog?></td>     
      </tr>
      <tr>
        <td>Nama Katalog</td>
        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" style="color:black;"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="update" value="Simpan" style="color:black;"></td>
      </tr>
    </table>
  </form>
</body>
</html>