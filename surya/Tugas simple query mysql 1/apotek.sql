-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2022 at 03:08 PM
-- Server version: 10.3.35-MariaDB-log
-- PHP Version: 8.0.20

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
-- Table structure for table `manufaktur`
--

CREATE TABLE `manufaktur` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufaktur`
--

INSERT INTO `manufaktur` (`id`, `nama`, `alamat`) VALUES
(1, 'Dexa Medica', NULL),
(2, 'Sanbe Farma', NULL),
(3, 'Kalbe farma', NULL),
(4, 'Kimia Farma', NULL),
(5, 'Biofarma', NULL),
(6, 'Novartis', NULL),
(7, 'Nvell Pharmaceutical Laboratories', NULL),
(8, 'Lapi', NULL),
(9, 'Interbat', NULL),
(10, 'Ferron Pharmaceutical', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `id_manufaktur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `id_manufaktur`) VALUES
(1, 'AMOXICILIN', 4),
(2, 'AMPICILLIN', 4),
(3, 'Amoxan', 2),
(4, 'Hemapo', 3),
(5, 'Flubio Vaksin Influenza HA', 5),
(6, 'Gastrofer', 1),
(7, 'Sanmol', 2),
(8, 'Ibuprofen', 2),
(9, 'PREDNISONE', 4),
(10, 'CEFIXIME', 4);

-- --------------------------------------------------------

--
-- Table structure for table `obat_detail`
--

CREATE TABLE `obat_detail` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat_detail`
--

INSERT INTO `obat_detail` (`id`, `id_obat`, `qty`) VALUES
(1, 1, 10),
(2, 2, 9),
(3, 3, 10),
(4, 4, 10),
(5, 5, 8),
(6, 6, 6),
(7, 7, 10),
(8, 8, 8),
(9, 9, 10),
(10, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl_transaksi`, `total_bayar`) VALUES
(1, '2022-07-19', 3000),
(2, '2022-07-19', 10000),
(3, '2022-07-19', 5000),
(4, '2022-07-19', 5500),
(5, '2022-07-19', 9000),
(6, '2022-07-19', 12000),
(7, '2022-07-19', 6000),
(8, '2022-07-19', 7500),
(9, '2022-07-19', 8000),
(10, '2022-07-19', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_obat`, `qty`, `harga`) VALUES
(1, 1, 1, 2, 2000),
(2, 2, 2, 2, 3000),
(3, 3, 2, 2, 3000),
(4, 4, 5, 3, 3000),
(5, 5, 7, 1, 10000),
(6, 6, 5, 3, 3000),
(7, 7, 6, 2, 5000),
(8, 8, 8, 3, 7000),
(9, 9, 2, 2, 3000),
(10, 10, 9, 3, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufaktur`
--
ALTER TABLE `manufaktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manufaktur` (`id_manufaktur`);

--
-- Indexes for table `obat_detail`
--
ALTER TABLE `obat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufaktur`
--
ALTER TABLE `manufaktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat_detail`
--
ALTER TABLE `obat_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_manufaktur`) REFERENCES `manufaktur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obat_detail`
--
ALTER TABLE `obat_detail`
  ADD CONSTRAINT `obat_detail_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
