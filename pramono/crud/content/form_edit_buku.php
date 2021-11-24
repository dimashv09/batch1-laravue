<?php 
include '../app/connection.php';

$id = $_GET['id'];

$select_books = "SELECT bukus.id, bukus.isbn, 
        bukus.judul, 
        penerbits.nama_penerbit, 
        bukus.tahun, 
        pengarangs.nama_pengarang, 
        katalogs.nama AS katalog, 
        bukus.qty_stok,
        bukus.id_penerbit,
        bukus.id_pengarang,
        bukus.id_katalog,
        bukus.harga_pinjam FROM bukus
        INNER JOIN penerbits ON bukus.id_penerbit=penerbits.id
        INNER JOIN pengarangs ON bukus.id_pengarang=pengarangs.id
        INNER JOIN katalogs ON bukus.id_katalog=katalogs.id 
        WHERE bukus.id = '$id'
        ";

$books = mysqli_query($conn, $select_books);
$book = mysqli_fetch_assoc($books);

$select_catalogs = "SELECT * FROM katalogs";
$select_publishers = "SELECT * FROM penerbits";
$select_authors = "SELECT * FROM pengarangs";
$catalogs = mysqli_query($conn, $select_catalogs);
$publishers = mysqli_query($conn, $select_publishers);

$authors = mysqli_query($conn, $select_authors);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Buku</title>
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
                        <h4>Edit Buku</h4>
                    </div>
                    <form action="../app/update.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $book['id']; ?>">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN :</label>
                                    <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Masukan ISBN" required value="<?= $book['isbn']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul" value="<?= $book['judul']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <select class="form-control" name="penerbit" id="penerbit" required>
                                        <option value="<?= $book['id_penerbit']; ?>"><?= $book['nama_penerbit'];?></option>
                                        <?php 
                                            foreach ($publishers as $key => $value) : ?>
                                                <option value="<?= $value['id'];?>">
                                                    <?= $value['nama_penerbit']; ?>
                                                </option>
                                            <?php endforeach 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Masukan tahun terbit" value="<?= $book['tahun'];?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <select class="form-control" name="pengarang" id="pengarang" required>
                                        <option value="<?= $book['id_pengarang']; ?>"><?= $book['nama_pengarang'];?></option>
                                        <?php 
                                            foreach ($authors as $key => $value) : ?>
                                                <option value="<?= $value['id'];?>">
                                                    <?= $value['nama_pengarang']; ?>
                                                </option>
                                            <?php endforeach 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="katalog" class="form-label">Katalog</label>
                                    <select class="form-control" name="katalog" id="katalog" required>
                                        <option value="<?= $book['id_katalog']; ?>"><?= $book['katalog'];?></option>
                                        <?php 
                                            foreach ($catalogs as $key => $value) : ?>
                                                <option value="<?= $value['id'];?>">
                                                    <?= $value['nama']; ?>
                                                </option>
                                            <?php endforeach 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukan jumlah stok" value="<?= $book['qty_stok'];?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Pinjam</label>
                                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan harga pinjam" value="<?= $book['harga_pinjam'];?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center py-3">
                        <button type="submit" class="btn btn-primary" name="edit-buku">Ubah</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
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
