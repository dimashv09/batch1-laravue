-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 08.45
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jenis_obat`
--

CREATE TABLE `data_jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL,
  `jenis_obat` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_jenis_obat`
--

INSERT INTO `data_jenis_obat` (`id_jenis_obat`, `jenis_obat`) VALUES
(1, 'sublingual'),
(2, 'obat tempel'),
(3, 'inhaler'),
(4, 'obat suntik'),
(5, 'cair'),
(6, 'tablet'),
(7, 'kapsul'),
(8, 'obat tetes'),
(9, 'supositoria'),
(10, 'obat tetes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kontak_person` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nama`, `gender`, `alamat`, `tanggal_lahir`, `kontak_person`) VALUES
(1, 'suci', 'perempuan', 'jalan sawah dalem', '2013-01-01', '08123456789'),
(3, 'celsi', 'perempuan', 'jalan ratu ', '2013-06-05', '081223344567'),
(7, 'usi', 'perempuan', 'jalan jalan', '2014-09-18', '085766546542'),
(9, 'berlin', 'perempuan', 'jalan sana', '2013-11-15', '08995543321'),
(10, 'berlina', 'perempuan', 'jalan sana', '2013-11-15', '08995543321'),
(11, 'Dadang', 'laki-laki', 'jalan soeharto', '2014-10-21', '087654321765'),
(13, 'sule', 'laki-laki', 'jalan bebas', '2013-05-05', '089765346787'),
(14, 'ganu', 'laki-laki', 'jalan uskana', '2011-04-12', '08976523546'),
(15, 'komkom', 'perempuan', 'jalang merah', '2023-04-03', '08763482888'),
(16, 'Dadang', 'laki-laki', 'jalan soeharto', '2014-10-21', '087654321765');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `alamat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `nama`, `gender`, `alamat`) VALUES
(1, 'agus', 'laki-laki', 'jalan baru'),
(2, 'rudi', 'laki-laki', 'rt 5'),
(3, 'rita', 'perempuan', 'rt 09'),
(4, 'trania', 'perempuan', 'rt 09'),
(5, 'duloh', 'laki laki', 'rt 04'),
(6, 'dani', 'laki laki', 'rt 07'),
(7, 'duloh', 'laki laki', 'rt 04'),
(8, 'dani', 'laki laki', 'rt 07'),
(9, 'mila', 'perempuan', 'rt 20'),
(10, 'sudir', 'laki laki', 'rt 34'),
(11, 'duloh', 'laki laki', 'rt 04'),
(12, 'dani', 'laki laki', 'rt 07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `kode_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int(15) NOT NULL,
  `id_pegawai` int(15) NOT NULL,
  `id_obat` int(15) NOT NULL,
  `id_jenis_obat` int(15) NOT NULL,
  `jumlah_obat` decimal(15,0) NOT NULL,
  `total` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_penjualan`
--

INSERT INTO `data_penjualan` (`kode_transaksi`, `tanggal`, `id_pelanggan`, `id_pegawai`, `id_obat`, `id_jenis_obat`, `jumlah_obat`, `total`) VALUES
(1, '2023-06-25', 1, 1, 2, 1, 3, 2),
(2, '2023-06-25', 1, 1, 2, 1, 3, 2),
(3, '2023-06-25', 1, 1, 2, 1, 3, 2),
(4, '2023-07-03', 1, 9, 4, 5, 2, 2),
(5, '2023-07-03', 12, 3, 6, 5, 2, 2),
(6, '2023-07-03', 12, 3, 6, 5, 2, 2),
(7, '2023-07-04', 5, 11, 5, 6, 1, 1),
(8, '2023-07-03', 12, 3, 6, 5, 2, 2),
(9, '2023-07-03', 8, 3, 8, 8, 1, 1),
(10, '2023-07-03', 12, 3, 6, 5, 2, 2),
(11, '2023-07-03', 2, 15, 2, 3, 1, 1),
(12, '2023-07-03', 12, 3, 6, 5, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `harga` decimal(15,0) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `harga`, `id_jenis_obat`) VALUES
(3, 'komix', 3000, 1),
(4, 'komix', 3000, 1),
(5, 'oskadon', 5000, 3),
(6, 'oskadon', 5000, 3),
(7, 'antipiretik', 3000, 7),
(8, 'amoxicillin', 3000, 6),
(9, 'antipiretik', 3000, 7),
(10, 'amoxicillin', 3000, 6),
(11, 'antangin', 4000, 5),
(12, 'antipiretik', 3000, 7),
(13, 'amoxicillin', 3000, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_jenis_obat`
--
ALTER TABLE `data_jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_pegawai`,`id_obat`,`id_jenis_obat`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jenis_obat` (`id_jenis_obat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `fk_data_jenis_obat` (`id_jenis_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_jenis_obat`
--
ALTER TABLE `data_jenis_obat`
  MODIFY `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD CONSTRAINT `data_penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `data_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_penjualan_ibfk_2` FOREIGN KEY (`id_jenis_obat`) REFERENCES `data_jenis_obat` (`id_jenis_obat`),
  ADD CONSTRAINT `data_penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_data_jenis_obat` FOREIGN KEY (`id_jenis_obat`) REFERENCES `data_jenis_obat` (`id_jenis_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
