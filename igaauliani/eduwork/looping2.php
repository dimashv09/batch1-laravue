<?php
// Membuat tabel dengan dua kolom "No" dan "Nama"
echo "<table border='1'>";

// Mencetak baris header tabel
echo "<tr style='background-color: blue;'><td>No</td><td>Nama</td><td>Kelas</td></tr>";

// Looping untuk mengisi data ke dalam tabel
for ($i = 1; $i <= 10; $i++) {
    $Kelas = 11 - $i;
    echo "<tr><td>$i</td><td>Nama $i</td><td>Kelas $Kelas</td></tr>";
}

echo "</table>";
?>
