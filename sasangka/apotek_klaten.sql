-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 12:05 PM
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
(10, 'panadol', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `tgl_penjualan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jual detail`
--

CREATE TABLE `jual detail` (
  `id` int(11) NOT NULL,
  `no_transaksi` int(64) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` varchar(32) NOT NULL,
  `harga` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jual temporay`
--

CREATE TABLE `jual temporay` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(64) NOT NULL,
  `kd_barang` int(50) NOT NULL,
  `jumlah` varchar(32) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `sub_total` varchar(15) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kd_satuan` int(50) NOT NULL,
  `kd_kategori` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `harga_beli` varchar(1000) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `password` varchar(50) NOT NULL,
  `acrive` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis obat`
--
ALTER TABLE `jenis obat`
  ADD PRIMARY KEY (`kd_satuan`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jual detail`
--
ALTER TABLE `jual detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `jual temporay`
--
ALTER TABLE `jual temporay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `user` (`user`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `no_faktur_2` (`no_faktur`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_satuan` (`kd_satuan`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis obat`
--
ALTER TABLE `jenis obat`
  MODIFY `kd_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jual detail`
--
ALTER TABLE `jual detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jual temporay`
--
ALTER TABLE `jual temporay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `kd_toko` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `jual temporay` (`no_faktur`);

--
-- Constraints for table `jual detail`
--
ALTER TABLE `jual detail`
  ADD CONSTRAINT `jual detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jual` (`id`);

--
-- Constraints for table `jual temporay`
--
ALTER TABLE `jual temporay`
  ADD CONSTRAINT `jual temporay_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `obat` (`kd_barang`),
  ADD CONSTRAINT `jual temporay_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kd_satuan`) REFERENCES `jenis obat` (`kd_satuan`),
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `jual detail` (`kd_barang`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jual` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
