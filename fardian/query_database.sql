-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 09:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `komposisi` varchar(80) NOT NULL,
  `deskripsi_obat` text DEFAULT NULL,
  `manufaktur` varchar(30) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `komposisi`, `deskripsi_obat`, `manufaktur`, `id_perusahaan`, `id_jenis_obat`) VALUES
(1, 'Decolgen', 'simili simili simili', 'simili simili simili', 'KALBE', 1, 5),
(2, 'Inzana', 'simili simili', NULL, 'LABORA', 2, 6),
(4, 'Insana', 'dududududu', 'bal bal bal', 'KALBE', 1, 6),
(5, 'Hexagrip', 'dudududuud', NULL, 'KALBE', 1, 6),
(6, 'Poldanmig', 'dudududuudududu', NULL, 'LABORA', 2, 5),
(7, 'Fluzen', 'okokokookokoko', NULL, 'LABORA', 2, 6),
(8, 'Inhamzo', 'kokokokokokokokok', NULL, 'KALBE', 1, 5),
(9, 'Kalpotek', 'kikikikikikik', NULL, 'KALBE', 1, 5),
(10, 'Lampionezes', 'kikikikikiikk', NULL, 'LABORA', 2, 5),
(11, 'Inhumanizion', 'kikikikikikikik', NULL, 'KALBE', 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_jenis` (`id_jenis_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obat` (`id`),
  ADD CONSTRAINT `fk_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
