<?php
    include_once("../koneksi.php");
    $katalog =mysqli_query($connect, "SELECT * FROM katalogs");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <br>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <br>
        <title>Katalog</title>
    </head>
    <style>
        @import url('../style.css');
    </style>
    <body>
        <div class="container">
            <div class="navigation">
                <a href="../buku/index.php" class="navigation__link">Buku</a>
                <a href="../penerbit/index.php" class="navigation__link">Penerbit</a>
                <a href="../pengarang/index.php" class="navigation__link">Pengarang</a>
                <a href="../katalog/index.php" class="navigation__link">Katalog</a>
            </div>
            <a href="add.php" class="addb button">Add Data</a>
            <h3 class="page__title">List Katalog</h3>
            <table class="table__data">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $index = 0;
                    while($katalog_data = mysqli_fetch_array($katalog)) {
                        $index = $index + 1;
                        echo "<tr class='row_table'>";
                        echo "<td>".$index."</td>";
                        echo "<td>".$katalog_data["nama"]."</td>";
                        echo "<td>"."<a href='edit.php?id=$katalog_data[id]' class='editb button'>Edit</a>".
                        "<a href='delete.php?id=$katalog_data[id]' class='deleteb button'>Delete</a>"."</td>";
                        echo "<tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>