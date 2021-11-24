<?php
include '../app/connection.php';
$id = $_GET['id'];
$select_pengarang = "SELECT * FROM pengarangs WHERE id='$id'";
$obj_pengarang = mysqli_query($conn, $select_pengarang);
$pengarang = mysqli_fetch_assoc($obj_pengarang);
// var_dump($pengarang['nama_pengarang']);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Pengarang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Edit Pengarang</h4>
                    </div>
                    <form action="../app/update.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pengarang :</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama pengarang" value="<?= $pengarang['nama_pengarang']; ?>" required>
                                <input type="hidden" name="id" value="<?= $pengarang['id'];?>">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email pengarang" value="<?= $pengarang['email']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon :</label>
                                <input type="tel" name="telepon" id="telepon" class="form-control" placeholder="Masukan nomor telepon pengarang" value="<?= $pengarang['telp']; ?>" required>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                  <label for="alamat" class="form-label">Alamat :</label>
                                  <textarea class="form-control" name="alamat" id="alamat" rows="3" require><?= $pengarang['alamat']; ?></textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center py-3">
                        <button type="submit" class="btn btn-primary" name="edit-pengarang">Ubah</button>
                        <a href="pengarang.php" class="btn btn-secondary">Batal</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

