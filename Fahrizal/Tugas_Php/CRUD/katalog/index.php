<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog</title>
</head>
<?php
include_once("../connect.php");
$katalog = mysqli_query($mysqli, "SELECT katalog.*,id_katalog,nama FROM katalog ORDER BY id_katalog ASC");
$no = 0;

?>

<body>
    <center>
        <a href="../buku/index.php">Buku</a> |
        <a href="../penerbit/index.php">Penerbit</a> |
        <a href="../pengarang/index.php">Pengarang</a> |
        <a href="../katalog/index.php">Katalog</a>
        <hr>
    </center>

    <a href="create.php">Create New Katalog</a><br><br>

    <table width="80%" border="1">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        <?php
        while ($katalog_data = mysqli_fetch_array($katalog)) {
            $no++;
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $katalog_data['nama'] . "</td>";
            echo "<td><a href='update.php?id_katalog=$katalog_data[id_katalog]'>Edit</a> | <a href='delete.php?id_katalog=$katalog_data[id_katalog]'>Delete</a></td></tr>";
        }
        ?>
    </table>
    </div>
    </div>
    </div>

</body>

</html>