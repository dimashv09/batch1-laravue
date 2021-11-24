<?php
include "../app/connection.php";
$select_books = "SELECT bukus.id, bukus.isbn, 
        bukus.judul, 
        penerbits.nama_penerbit, 
        bukus.tahun, 
        pengarangs.nama_pengarang, 
        katalogs.nama AS katalog, 
        bukus.qty_stok, 
        bukus.harga_pinjam FROM bukus
        INNER JOIN penerbits ON bukus.id_penerbit=penerbits.id
        INNER JOIN pengarangs ON bukus.id_pengarang=pengarangs.id
        INNER JOIN katalogs ON bukus.id_katalog=katalogs.id 
        ORDER BY bukus.id DESC";
$select_catalogs = "SELECT * FROM katalogs";
$select_publishers = "SELECT * FROM penerbits";
$select_authors = "SELECT * FROM pengarangs";

$books = mysqli_query($conn, $select_books);
$catalogs = mysqli_query($conn, $select_catalogs);
$publishers = mysqli_query($conn, $select_publishers);
$authors = mysqli_query($conn, $select_authors);
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
                  <h4>Daftar Buku</h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahBuku">Baru</button>
                  <!-- modal box tambah buku -->
                  <div class="modal fade" id="tambahBuku" tabindex="-1" role="dialog" aria-labelledby="tambahBukuId" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Buku Baru</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../app/create.php" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN :</label>
                                <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Masukan ISBN" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <select class="form-control" name="penerbit" id="penerbit" required>
                                    <?php
                                    while ($publisher = mysqli_fetch_assoc($publishers)) : ?>
                                      <option value="<?= $publisher['id']; ?>"><?= $publisher['nama_penerbit']; ?></option>
                                    <?php endwhile ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Masukan tahun terbit" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <select class="form-control" name="pengarang" id="pengarang" required>
                                <?php
                                    while ($author = mysqli_fetch_assoc($authors)) : ?>
                                      <option value="<?= $author['id']; ?>"><?= $author['nama_pengarang']; ?></option>
                                    <?php endwhile ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="katalog" class="form-label">Katalog</label>
                                <select class="form-control" name="katalog" id="katalog" required>
                                  <?php
                                    while ($catalog = mysqli_fetch_assoc($catalogs)) : ?>
                                      <option value="<?= $catalog['id']; ?>"><?= $catalog['nama']; ?></option>
                                    <?php endwhile ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan jumlah stok" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="harga" class="form-label">Harga Pinjam</label>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan harga pinjam" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="buku-baru">Simpan</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- akir modal box tambah buku -->
          
                  <table class="table">
                    <thead class="bg-dark text-white text-center">
                      <th>ISBN</th>
                      <th>Judul</th>
                      <th>Penerbit</th>
                      <th>Tahun Terbit</th>
                      <th>Penulis</th>
                      <th>Katalog</th>
                      <th>Stok</th>
                      <th>Harga Pinjam</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                      <?php
                      if (mysqli_num_rows($books) > 0) {
                        while($book = mysqli_fetch_assoc($books)) : ?>
                            <tr>
                              <td><?= $book["isbn"]; ?></td>
                              <td><?= $book["judul"]; ?></td>
                              <td><?= $book["nama_penerbit"]; ?></td>
                              <td><?= $book["tahun"]; ?></td>
                              <td><?= $book["nama_pengarang"]; ?></td>
                              <td><?= $book["katalog"]; ?></td>
                              <td><?= $book["qty_stok"]; ?></td>
                              <td><?= $book["harga_pinjam"]; ?></td>
                              <td>
                                <a href="form_edit_buku.php?id=<?=$book['id'];?>" class="btn btn-sm btn-info d-inline">Edit</a>
                                <a href="../app/delete.php?buku=<?=$book['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin melanjutkan proses?')">Hapus</a>
                              </td>
                            </tr>
                        <?php endwhile ?>
                      <?php } else { ?>
                            <tr>
                              <td colspan="8">Belu ada data.</td>
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