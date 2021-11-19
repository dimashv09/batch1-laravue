-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 10:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `detil_obat`
--

CREATE TABLE `detil_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kd_obat_detil` int(11) NOT NULL,
  `kadaluarsa` varchar(20) NOT NULL,
  `kandungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detil_obat`
--

INSERT INTO `detil_obat` (`id`, `nama`, `id_jenis`, `kd_obat_detil`, `kadaluarsa`, `kandungan`) VALUES
(1, 'konidin', 1, 3, 'baik sebelum Mei 202', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'paramex', 2, 4, 'baik sebelum Agustus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(32) NOT NULL,
  `cara_pakai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama_jenis`, `cara_pakai`) VALUES
(1, 'Syrup', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'Kapsul', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nm_obat` varchar(11) NOT NULL,
  `id_detil` int(11) DEFAULT NULL,
  `id_rak` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nm_obat`, `id_detil`, `id_rak`, `id_pasien`) VALUES
(3, 'konidin', 1, 1, NULL),
(4, 'paramex', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `penyakit` varchar(64) NOT NULL,
  `nm_obat` int(11) NOT NULL,
  `kd_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `penyakit`, `nm_obat`, `kd_obat`) VALUES
(1, 'dadang', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'radang', 3, 3),
(2, 'ruhyana', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Flu', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rak_obat`
--

CREATE TABLE `rak_obat` (
  `id` int(11) NOT NULL,
  `nama_rak` varchar(32) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak_obat`
--

INSERT INTO `rak_obat` (`id`, `nama_rak`, `id_jenis`) VALUES
(1, 'satu', 1),
(2, 'dua', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_obat`
--
ALTER TABLE `detil_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis` (`id_jenis`),
  ADD KEY `fk_kd_obat_detil` (`kd_obat_detil`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pasien` (`id_pasien`),
  ADD KEY `fk_detil` (`id_detil`),
  ADD KEY `fk_rak` (`id_rak`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nm_obat` (`nm_obat`),
  ADD KEY `fk_kd_obat` (`kd_obat`);

--
-- Indexes for table `rak_obat`
--
ALTER TABLE `rak_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis_rak` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_obat`
--
ALTER TABLE `detil_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rak_obat`
--
ALTER TABLE `rak_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_obat`
--
ALTER TABLE `detil_obat`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`),
  ADD CONSTRAINT `fk_kd_obat_detil` FOREIGN KEY (`kd_obat_detil`) REFERENCES `obat` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_detil` FOREIGN KEY (`id_detil`) REFERENCES `detil_obat` (`id`),
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `fk_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak_obat` (`id`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_kd_obat` FOREIGN KEY (`kd_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_nm_obat` FOREIGN KEY (`nm_obat`) REFERENCES `obat` (`id`);

--
-- Constraints for table `rak_obat`
--
ALTER TABLE `rak_obat`
  ADD CONSTRAINT `fk_jenis_rak` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
