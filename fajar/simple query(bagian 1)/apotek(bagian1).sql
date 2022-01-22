-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2022 pada 02.37
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(40) NOT NULL,
  `stock` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stock`, `deskripsi`, `harga`) VALUES
(1, 'paramex', 5, 'obat pusing', 2000),
(2, 'diapet', 10, 'obat BAB', 3000),
(3, 'bodrex', 20, 'obat sakit kepala', 1500),
(4, 'entrostop', 5, 'obat BAB', 2000),
(5, 'insidal', 20, 'obat antibiotik', 3000),
(6, 'kalpanak', 0, 'untuk panu, kurap, dan penyakit kulit lainnya', 8000),
(7, 'alkohol', 15, 'pembersih luka', 10000),
(8, 'paracetamol', 12, 'tak diketahui', 15000),
(10, 'insto', 12, 'obat tetes mata', 10000),
(11, 'minyak kayu putih', 20, 'untuk menghangatkan badan, dan meredakan pusing', 12000),
(23, 'aspirin', 7, 'obat sakit kepala', 2000),
(24, 'komix', 20, 'obat  batuk', 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `tgl_lahir`, `alamat`) VALUES
(1, 'fajar', '2022-01-20', 'jakarta'),
(2, 'rizal', '2022-01-05', 'jakarta'),
(3, 'dimas', '2019-01-17', 'lampung'),
(4, 'hadi', '2022-01-10', 'sunter'),
(5, 'lingga', '2022-01-30', 'serang'),
(6, 'dwi', '2022-01-16', 'jakarta'),
(7, 'sulis', '2022-01-01', 'sunter'),
(8, 'se\'an', '2022-01-12', 'semarang'),
(9, 'veren', '2022-01-01', 'yogyakarta'),
(10, 'siti saropah', '2022-01-03', 'semarang'),
(11, 'sulaeman', '2022-01-15', 'jakarta'),
(13, 'sadam', '2000-07-25', 'jakarta'),
(14, 'riandy', '1995-08-28', 'medan'),
(15, 'shindy', '1999-08-02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pembeli_id`, `obat_id`, `jumlah`, `total_bayar`) VALUES
(1, 5, 11, 2, 0),
(2, 1, 3, 2, 0),
(3, 6, 10, 1, 0),
(4, 4, 2, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembeli` (`pembeli_id`),
  ADD KEY `fk_obat` (`obat_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
