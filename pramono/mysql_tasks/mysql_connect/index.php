<?php 
include "database/mysql.php";

use Database\MysqlConnection;

$koneksi = new MysqlConnection();
$queryAnggota = "SELECT * FROM anggotas";
$queryBuku = 
            "SELECT bukus.isbn, 
                    bukus.judul, 
                    penerbits.nama_penerbit AS penerbit, 
                    bukus.tahun, 
                    pengarangs.nama_pengarang AS pengarang
            FROM bukus 
            INNER JOIN penerbits ON bukus.id_penerbit = penerbits.id
            INNER JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
            ";

$anggota = $koneksi->query($queryAnggota);
$buku = $koneksi->query($queryBuku);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Connection Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <nav class="mb-2">
              <div class="nav nav-pills" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Member</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Buku</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <table class="table text-center">
                      <thead class="table-dark text-white">
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Registrasi</th>
                      </thead>
                      <tbody>
                        <?php
                        if ($anggota->num_rows > 0) {
                          // output data of each row
                              while($row = $anggota->fetch_assoc()) { ?>
                              <tr>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["sex"]; ?></td>
                                <td><?php echo $row["telp"]; ?></td>
                                <td><?php echo $row["alamat"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                              </tr>
                              <?php }
                            } else { ?>
                              <tr>
                                <td colspan="6">Belum Ada Data!</td>
                              </tr>
                        <?php  } ?>
                      </tbody>
                  </table>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <table class="table text-center">
                      <thead class="bg-dark text-white">
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Harga Pinjam</th>
                      </thead>
                      <tbody>
                        <?php
                        if ($buku->num_rows > 0) {
                          // output data of each row
                              while($row = $buku->fetch_assoc()) { ?>
                              <tr>
                                <td><?php echo $row["isbn"]; ?></td>
                                <td><?php echo $row["judul"]; ?></td>
                                <td><?php echo $row["penerbit"]; ?></td>
                                <td><?php echo $row["tahun"]; ?></td>
                                <td><?php echo $row["pengarang"]; ?></td>
                              </tr>
                              <?php }
                            } else { ?>
                              <tr>
                                <td colspan="6">Belum Ada Data!</td>
                              </tr>
                        <?php  } ?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>