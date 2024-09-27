<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>
<?php
include_once("../connect.php");
$pengarang = mysqli_query($mysqli, "SELECT pengarang.*, id_pengarang,nama_pengarang,email,telp,alamat FROM pengarang");
$no = 0;
?>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <br /><br />
                <center>
                    <a href="../buku/index.php"><button type="button" class="btn btn-success">Buku</button>
                        <a href="../penerbit/index.php"><button type="button" class="btn btn-danger">Penerbit</button>
                            <a href="../pengarang/index.php"><button type="button"
                                    class="btn btn-dark">Pengarang</button>
                                <a href="../katalog/index.php"><button class="btn btn-primary"
                                        type="submit">Katalog</button>
                </center>
                <br /><br />
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-outline-primary" href="create.php">Add New Pengarang</a><br><br>

                        <table class="table" width="80%" border="1">
                            <tr class="table-primary">
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            while ($pengarang_data = mysqli_fetch_array($pengarang)) {
                                $no++;
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $pengarang_data['nama_pengarang'] . "</td>";
                                echo "<td>" . $pengarang_data['email'] . "</td>";
                                echo "<td>" . $pengarang_data['telp'] . "</td>";
                                echo "<td>" . $pengarang_data['alamat'] . "</td>";
                                echo "<td><a class='btn btn-primary btn-sm' href='update.php?id_pengarang=$pengarang_data[id_pengarang]'>Edit</a> | <a class='btn btn-danger btn-sm' href='delete.php?id_pengarang=$pengarang_data[id_pengarang]'>Delete</a></td></tr>";
                            }


                            ?>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>