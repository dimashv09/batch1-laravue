-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 07:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `nama` varchar(32) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kadaluarsa` text NOT NULL,
  `kandungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(32) NOT NULL,
  `cara_pakai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `id_detil` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `penyakit` varchar(32) NOT NULL,
  `nama_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_obat`
--
ALTER TABLE `detil_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_jenis` (`id_jenis`);

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
  ADD KEY `fk_detilobat` (`id_detil`),
  ADD KEY `fk_rak` (`id_rak`);

--
-- Indexes for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat_pasien` (`id_obat`),
  ADD KEY `fk_pasien_obat` (`id_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak_obat`
--
ALTER TABLE `rak_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rak_jenis_obat` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_obat`
--
ALTER TABLE `detil_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rak_obat`
--
ALTER TABLE `rak_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_obat`
--
ALTER TABLE `detil_obat`
  ADD CONSTRAINT `fk_detil_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_detilobat` FOREIGN KEY (`id_detil`) REFERENCES `detil_obat` (`id`),
  ADD CONSTRAINT `fk_rak` FOREIGN KEY (`id_rak`) REFERENCES `rak_obat` (`id`);

--
-- Constraints for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD CONSTRAINT `fk_obat_pasien` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pasien_obat` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `rak_obat`
--
ALTER TABLE `rak_obat`
  ADD CONSTRAINT `fk_rak_jenis_obat` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
