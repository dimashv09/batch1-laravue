<?php
$sumber = "Archive.json";
$konten = file_get_contents($sumber);
$data = json_decode($konten, true);
//menghitung jumlah data

?>
<html>

<head>
    <link href="style.css" rel="stylesheet" />
    <title> Data Nilai </title>
</head>

<body>
    <header>
        <h1> DATA NILAI SISWA</h1>
    </header>
    <table>
        <tr>
            <th>
                <h1>No.</h1>
            </th>
            <th>
                <h1>Nama</h1>
            </th>
            <th>
                <h1>kelas</h1>
            </th>
            <th>
                <h1>Alamat</h1>
            </th>
            <th>
                <h1>Tanggal_Lahir</h1>
            </th>
            <th>
                <h1>Nilai</h1>
            </th>
            <th>
                <h1>Hasil<h1>
            </th>
        </tr>
        <?php
        for ($a = 1; $a <= 6; $a += 1) {
            print "<tr>";
            //penomeran otomatis
            print "<td>" . $a . "</td>";
            //menayangkan data
            print "<td>" . $data[$a]['nama'] . "</td>";
            print "<td>" . $data[$a]['kelas'] . "</td>";
            print "<td>" . $data[$a]['alamat'] . "</td>";
            print "<td>" . $data[$a]['tanggal_lahir'] . "</td>";
            print "<td>" . $data[$a]['nilai'] . "</td>";
            print "<td>" . $data[$a]['hasil'] . "</td>";

        }
        ?>
    </table>
</body>

</html>