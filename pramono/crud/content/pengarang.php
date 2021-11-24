<?php
include "../app/connection.php";

$select_pengarang = "SELECT * FROM pengarangs";
$pengarang = mysqli_query($conn, $select_pengarang);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>CRUD PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar -->
    <?php include "navbar.php"; ?>
    <!-- navbar end -->
    
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-md-9">
              <div class="card">
                <?php include 'notif.php'; ?>
                <div class="card-header text-center">
                  <h4>Daftar Pengarang</h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahPengarang">Baru</button>
                  <!-- modal box tambah pengarang -->
                  <div class="modal fade" id="tambahPengarang" tabindex="-1" role="dialog" aria-labelledby="tambahPengarangId" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Pengarang Baru</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../app/create.php" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pengarang :</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama pengarang" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email pengarang" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon :</label>
                                <input type="tel" name="telepon" id="telepon" class="form-control" placeholder="Masukan nomor telepon pengarang" required>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="alamat" class="form-label">Alamat :</label>
                                  <textarea class="form-control" name="alamat" id="alamat" rows="3" require></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="pengarang-baru">Simpan</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- akir modal box tambah pengarang -->
          
                  <table class="table">
                    <thead class="bg-dark text-white text-center">
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Alamat</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php
                      if (mysqli_num_rows($pengarang) > 0) {
                          foreach ($pengarang as $key => $value) : ?>
                              <tr>
                                <td><?= $value["nama_pengarang"]; ?></td>
                                <td><?= $value["email"]; ?></td>
                                <td><?= $value["telp"]; ?></td>
                                <td><?= $value["alamat"]; ?></td>
                                <td>
                                  <a href="form_edit_pengarang.php?id=<?=$value['id'];?>" class="btn btn-sm btn-info d-inline">Edit</a>
                                  <a href="../app/delete.php?pengarang=<?= $value['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin melanjutkan proses?')">Hapus</a>
                                </td>
                              </tr>   
                          <?php endforeach;
                      } else { ?>
                            <tr>
                              <td colspan="8">Belum ada data.</td>
                            </tr>
                      <?php } ?>
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

<?php 
session_unset();