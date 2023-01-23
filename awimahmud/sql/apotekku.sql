-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_cust` int(5) NOT NULL,
  `nama_cust` varchar(30) NOT NULL,
  `jk_cust` enum('L','P') NOT NULL,
  `umur` char(10) NOT NULL,
  `alamat` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_cust`, `nama_cust`, `jk_cust`, `umur`, `alamat`) VALUES
(1, 'awi', 'L', '27', 'bukulasa'),
(2, 'andi', 'L', '25', 'bukulasa'),
(3, 'ando', 'L', '23', 'manado'),
(4, 'nyong', 'L', '26', 'seli'),
(5, 'indah', 'P', '28', 'durian'),
(6, 'wiwin', 'P', '29', 'galala'),
(7, 'abang sido', 'L', '30', 'afa-affa'),
(8, 'bunga', 'P', '27', 'hijrah'),
(9, 'amar', 'L', '27', 'hijrah'),
(10, 'adit', 'L', '25', 'sofifi');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `harga_obat` char(20) NOT NULL,
  `stok_obat` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok_obat`) VALUES
(1, 'Abacavir', 'sakit hati', '10000', '50'),
(2, 'Acarbose', 'sakit tenggorokan', '10000', '40'),
(3, 'Acebutolol', 'sakit kepala', '20000', '50'),
(4, 'Acetylcysteine', 'paru-paru', '50000', '20'),
(5, 'Aclidinium', 'sesak nafas', '40000', '30'),
(6, 'Asam Mefenamat', 'nyeri otot', '10000', '40'),
(7, 'Ibuprofen', 'sakit kepala', '15000', '50'),
(8, 'Imboost', 'sesak nafas', '10000', '50'),
(9, 'Super Tetra', 'luka luar', '5000', '60'),
(10, 'Dexamethasone', 'batuk berdahak', '20000', '40');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(10) NOT NULL,
  `jumlah_order` char(15) NOT NULL,
  `tgl_order` date NOT NULL,
  `id_cust` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `jumlah_order`, `tgl_order`, `id_cust`, `id_obat`) VALUES
(1, '2', '2023-01-15', 1, 1),
(2, '1', '2023-01-18', 2, 2),
(3, '3', '2023-01-17', 3, 4),
(4, '5', '2023-01-16', 4, 3),
(5, '2', '2023-01-17', 5, 8),
(6, '7', '2023-01-19', 6, 7),
(7, '10', '2023-01-16', 7, 9),
(8, '11', '2023-01-13', 8, 6),
(9, '4', '2023-01-16', 9, 7),
(10, '6', '2023-01-17', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `qty_pembelian` char(20) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `qty_pembelian`, `tgl_pembelian`, `id_obat`, `id_sup`) VALUES
(1, '100', '2023-01-10', 1, 2),
(2, '100', '2023-01-10', 2, 2),
(3, '100', '2023-01-11', 4, 1),
(4, '50', '2023-01-11', 4, 1),
(5, '50', '2023-01-11', 5, 1),
(6, '50', '2023-01-11', 6, 1),
(7, '100', '2023-01-13', 7, 1),
(8, '50', '2023-01-13', 8, 1),
(9, '150', '2023-01-10', 9, 2),
(10, '200', '2023-01-13', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(10) NOT NULL,
  `nama_sup` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nama_sup`, `alamat`, `kota`) VALUES
(1, 'kimia farma', 'buki\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\mangga dua', 'ternate'),
(2, 'halal farma', 'gamalama', 'ternate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_cust_fk` (`id_cust`),
  ADD KEY `id_obat_fk` (`id_obat`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_sup_fk` (`id_sup`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cust` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `id_cust_fk` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id_cust`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_obat_fk` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `id_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_sup_fk` FOREIGN KEY (`id_sup`) REFERENCES `supplier` (`id_sup`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
