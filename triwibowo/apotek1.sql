-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 08:16 AM
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
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `cara_pakai` varchar(62) NOT NULL,
  `bagus_untuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama`, `cara_pakai`, `bagus_untuk`) VALUES
(1, 'obat syrup', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illu', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum corporis aut architecto iusto et voluptatum, laborum quis nostrum minus cupiditate.'),
(2, 'obat oles', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illu', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum corporis aut architecto iusto et voluptatum, laborum quis nostrum minus cupiditate.');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `keterangan` text NOT NULL,
  `kadaluarsa` varchar(20) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `keterangan`, `kadaluarsa`, `id_jenis`) VALUES
(1, 'Konidin', '   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum corporis aut architecto iusto et voluptatum, laborum quis nostrum minus cupiditate.', 'baik sebelum Mei 202', 1),
(2, 'handsaplas', '   Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum corporis aut architecto iusto et voluptatum, laborum quis nostrum minus cupiditate.', 'baik sebelum Agustus', 2);

--
-- Indexes for dumped tables
--

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
  ADD KEY `fk_jenisobat` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_jenisobat` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
