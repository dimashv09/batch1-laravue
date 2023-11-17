<?php

$siswaArray = [
    [
        "nama" => "Pelita",
        "kelas" => "Laravel",
        "alamat" => "Bandung",
        "tanggal_lahir" => "1997-12-27",
        "nilai" => 90
    ],
    [
        "nama" => "Najmina",
        "kelas" => "Vue JS",
        "alamat" => "Jakarta",
        "tanggal_lahir" => "1998-10-07",
        "nilai" => 55
    ],
    [
        "nama" => "Anita",
        "kelas" => "Design",
        "alamat" => "Semarang",
        "tanggal_lahir" => "1999-08-20",
        "nilai" => 80
    ],
    [
        "nama" => "Bayu",
        "kelas" => "Digital Marketing",
        "alamat" => "Bandung",
        "tanggal_lahir" => "1990-01-01",
        "nilai" => 65
    ],
    [
        "nama" => "Nasa",
        "kelas" => "UI/UX Designer",
        "alamat" => "Bandung",
        "tanggal_lahir" => "1995-04-10",
        "nilai" => 70
    ],
    [
        "nama" => "Rahma",
        "kelas" => "Node JS",
        "alamat" => "Yogyakarta",
        "tanggal_lahir" => "1993-09-15",
        "nilai" => 85
    ]
];

// Fungsi untuk menghitung umur berdasarkan tanggal lahir
function hitungUmur($tanggal_lahir) {
    $today = new DateTime();
    $birthdate = new DateTime($tanggal_lahir);
    $umur = $today->diff($birthdate)->y;
    return $umur;
}

// Fungsi untuk menentukan hasil berdasarkan nilai
function tentukanHasil($nilai){
if ($nilai>=90 && $nilai <=100){
    return "A";
}elseif ($nilai>=80 && $nilai <=90) {
    return "B";
}elseif ($nilai>=70 && $nilai <=80){
    return "C";
}else{
    return "D";
}
}

// Membuat tabel HTML
echo "<table border='1'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Nilai</th>
            <th>Hasil</th>
        </tr>";

// Looping through the array and printing the data in a table
foreach ($siswaArray as $key => $siswa) {
    echo "<tr>
            <td>" . ($key + 1) . "</td>
            <td>" . $siswa['nama'] . "</td>
            <td>" . $siswa['tanggal_lahir'] . "</td>
            <td>" . hitungUmur($siswa['tanggal_lahir']) . "</td>
            <td>" . $siswa['alamat'] . "</td>
            <td>" . $siswa['kelas'] . "</td>
            <td>" . $siswa['nilai'] . "</td>
            <td>" . tentukanHasil($siswa['nilai']) . "</td>
          </tr>";
}

echo "</table>";

?>
