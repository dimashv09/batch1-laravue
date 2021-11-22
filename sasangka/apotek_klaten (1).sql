-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 04:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek klaten`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis obat`
--

CREATE TABLE `jenis obat` (
  `kd_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(64) NOT NULL,
  `active` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis obat`
--

INSERT INTO `jenis obat` (`kd_satuan`, `nama_satuan`, `active`) VALUES
(1, 'Obat cair', '2022'),
(2, 'Tablet', '2023'),
(3, 'Kapsul', '2025'),
(4, 'Obat Oles', '2026'),
(5, 'obat tetes', '2021'),
(6, 'Suppositoria', '2024'),
(7, 'Inhaler', '2020'),
(8, 'Obat suntik', '2019'),
(9, 'obat tempel', '2018'),
(10, 'Ekstrak', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_barang` int(11) NOT NULL,
  `kd_satuan` int(11) NOT NULL,
  `harga_beli` varchar(32) NOT NULL,
  `harga_jual` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_barang`, `kd_satuan`, `harga_beli`, `harga_jual`) VALUES
(1, 0, 1, '100', '1500'),
(2, 0, 1, '1000', '1300'),
(3, 0, 3, '1520', '2000'),
(4, 0, 11, '2000', '3000'),
(5, 0, 6, '6000', '7000'),
(7, 0, 7, '7000', '8000'),
(8, 0, 7, '7500', '9000'),
(9, 0, 99, '99000', '100000'),
(10, 0, 111, '12999', '23000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_daftar` varchar(32) NOT NULL,
  `tipe` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `kd_toko` int(11) NOT NULL,
  `nama_toko` varchar(64) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(32) NOT NULL,
  `no telepon` varchar(13) NOT NULL,
  `fax` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`kd_toko`, `nama_toko`, `alamat`, `kota`, `no telepon`, `fax`) VALUES
(1, 'TOKO PAINO WIDODO', 'pasar karangdowo', 'Klaten', '081210278162', '12728'),
(2, 'BU TARNI KALTENG', 'Kali tengah', 'Banjarmasin', '0812102782122', '1232'),
(3, 'SRI AYUK', 'Minggiran karangdowo', 'Klaten', '081210278122', '12728'),
(4, 'BU SULIS GURU', 'Lapangan munggung', 'SOLO', '081210278162', '123'),
(5, 'Kurniawan ', 'Banaran Munggung', 'Bekasi', '0812102782321', '2212'),
(6, 'alfamart1', 'Karangdowo', 'Jakarta', '081210272262', '2222'),
(7, 'Indomaret Pusat', 'TANGERANG', 'Cilegon', '08121022262', '1111'),
(8, 'SISWA BARU', 'BANARAN MINGGGIRAN', 'SURAKARTA', '081210278162', '333'),
(9, 'Madani pusat', 'Kampung sewu', 'Jambi', '0812133331', '12122'),
(10, 'ASTU', 'PEDAN', 'WONOSOBO', '081210311222', '121222');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(64) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` varchar(32) NOT NULL,
  `harga` varchar(13) NOT NULL,
  `kd_pelanggan` int(15) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kd_toko` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `kd_toko`) VALUES
(1, 'paino', 'akusayangkamu', 1),
(2, 'BU TARNI', 'ORAOLEHUTANG', 2),
(3, 'SRI AYU', 'PESUGIHAN', 3),
(4, 'BU SULIS', 'PELIT', 4),
(5, 'KURNIA', 'Gawon12', 5),
(6, 'ALFAMART', 'Banyakdiskon', 6),
(7, 'Indormaret', 'Topupdulu', 7),
(8, 'Siswabaru', 'sekolah', 8),
(9, 'Madani', 'minggiran', 9),
(10, 'astu', 'pedan', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis obat`
--
ALTER TABLE `jenis obat`
  ADD PRIMARY KEY (`kd_satuan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_satuan` (`kd_satuan`),
  ADD KEY `kd_satuan_2` (`kd_satuan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kd_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `acrive` (`kd_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis obat`
--
ALTER TABLE `jenis obat`
  MODIFY `kd_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `kd_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jual` (`id`);

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`kd_toko`) REFERENCES `user` (`kd_toko`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
