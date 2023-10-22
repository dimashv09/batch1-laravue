<?php
$servername = "localhost";
$database = "perpus";
$username = "root";
$password = "";

	//buat koneksi database
	$koneksi = mysqli_connect($servername, $username, $password);
	// mengecek koneksi
	if($koneksi){
		$buka = mysqli_select_db($koneksi, $database);
		// echo "database dapat terhubung";
		if(!$buka){
		echo "database tidak dapat terhubung";
		}
	}else{
		echo "mysql tidak terhubung";
	}

	// mysqli_close($koneksi);

	$sql1 = "SELECT anggota.nama AS 'nama anggota', peminjaman.tgl_pinjam, qty AS jumlah, judul FROM anggota 
			JOIN peminjaman ON anggota.id_anggota = peminjaman.id_anggota
			JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam
			JOIN buku ON detail_peminjaman.isbn = buku.isbn where judul like '%Laravel%' and qty >= 1 order by qty desc;
			";
	$sql2 = "SELECT anggota.nama AS 'nama anggota', peminjaman.tgl_kembali, qty AS jumlah, judul FROM anggota 
			JOIN peminjaman ON anggota.id_anggota = peminjaman.id_anggota
			JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam
			JOIN buku ON detail_peminjaman.isbn = buku.isbn where judul like '%PHP%' and qty = 1 order by qty asc;
			";
	$result1 = $koneksi->query($sql1);
	$result2 = $koneksi->query($sql2);
	echo "<h5>Pinjam<h5>";
	if($result1->num_rows > 0){
		while($row = $result1->fetch_assoc()){
		echo "Buku : " . $row['nama anggota'] . " | " . $row['tgl_pinjam'] . " | " . $row['jumlah'] . " | " . $row['judul']."<br>";
		}
	}else{
		echo "0 result";
	}
	// echo "<br>";
	echo "<h5>Kembali<h5>";
	if($result2->num_rows > 0){
		while($row = $result2->fetch_assoc()){
			echo "Buku : " . $row['nama anggota'] . " | " . $row['tgl_kembali'] . " | " . $row['jumlah'] . " | " . $row['judul']."<br>";
		}
	}else{
		echo "0 result";
	}
	$koneksi->close();
	
?>