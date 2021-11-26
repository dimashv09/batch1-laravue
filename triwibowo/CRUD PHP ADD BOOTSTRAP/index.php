<?php
    include_once("connect.php");

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $buku = mysqli_query($mysqli, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
        WHERE judul LIKE '%".$cari."%'
        ORDER BY judul ASC");    
    }else{
        $buku = mysqli_query($mysqli, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
        ORDER BY judul ASC");
    }
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<div class = "container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php"><b>Tabel Buku</b></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Penerbit/index.php">Penerbit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Pengarang/index.php">Pengarang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Katalog/index.php">Katalog</a>
        </li>
      </ul>     
      <form class="d-flex mb-2 mb-lg-0" action="index.php" method="get">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success"  type="submit">Search</button>
        <a href="index.php"><button class="btn btn-outline-dark ms-3" >Refresh</button></a>
      </form>
    </div>
  </div>
</nav>


<!-- <center>
    <a href="index.php">Buku</a> |
    <a href="Penerbit/index.php">Penerbit</a> |
    <a href="Pengarang/index.php">Pengarang</a> |
    <a href="Katalog/index.php">Katalog</a>
    <hr>
</center> -->

<a href="add.php"><button class="btn btn-primary mt-4 mb-2">Tambah Buku</button></a>
 
    <table class="table table-hover" width='80%'>
 
    <tr>
        <th>ISBN</th> 
        <th>Judul</th> 
        <th>Tahun</th> 
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Katalog</th>
        <th>Stok</th>
        <th>Harga Pinjam</th>
        <th>Aksi</th>
    </tr>
    <?php
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-primary btn-sm' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger btn-sm' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
    </div>
</body>
</html>
