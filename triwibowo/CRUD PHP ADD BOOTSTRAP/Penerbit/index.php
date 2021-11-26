<?php
    include_once("connect.php");
                
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits WHERE nama_penerbit LIKE '%".$cari."%'");
    }else{
        $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
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
    <a class="navbar-brand" href="index.php"><b>Tabel Penerbit</b></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Penerbit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Pengarang/index.php">Pengarang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Katalog/index.php">Katalog</a>
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
    <a href="../index.php">Buku</a> |
    <a href="index.php">Penerbit</a> |
    <a href="../Pengarang/index.php">Pengarang</a> |
    <a href="../Katalog/index.php">Katalog</a>
    <hr>
</center> -->

<a href="add.php"><button class="btn btn-primary mt-4 mb-2">Tambah Penerbit</button></a>
 
 
    <table class="table table-hover" width='80%' >
 
    <tr>
        <th>ID</th> 
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
   
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";    
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";    
    
            echo "<td><a class='btn btn-primary btn-sm' href='edit.php?id=$penerbit_data[id]'>Edit</a> | <a class='btn btn-danger btn-sm' href='delete.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>