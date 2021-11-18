-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2021 at 07:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `detail_pasien`
--

CREATE TABLE `detail_pasien` (
  `id` int(11) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pasien`
--

INSERT INTO `detail_pasien` (`id`, `umur`, `alamat`, `tanggal_lahir`, `golongan_darah`, `berat_badan`, `tinggi_badan`) VALUES
(1, '26', 'Perum Galaxy', '2021-11-02', 'B', 62, 171),
(2, '22', 'Jakarta', '2021-11-06', 'B-', 56, 168),
(3, '19', 'Bandung', '2021-10-06', 'O', 52, 158),
(4, '28', 'Jakarta', '2021-09-15', 'A', 62, 171),
(5, '24', 'Yogyakarta', '2021-10-19', 'A', 59, 168),
(6, '17', 'Bekasi', '2021-08-03', 'B', 56, 162),
(7, '20', 'Surabaya', '2021-10-18', 'O', 64, 164),
(8, '18', 'Semarang', '2021-11-08', 'A', 51, 166),
(9, '32', 'Cirebon', '2021-11-01', 'A', 67, 167),
(10, '28', 'Solo', '2021-10-02', 'A', 58, 174);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama`) VALUES
(1, 'Tablet'),
(2, 'Kapsul'),
(3, 'Serbuk'),
(4, 'Pil'),
(5, 'larutan'),
(6, 'kaplet'),
(7, 'obat tetes'),
(8, 'salep'),
(9, 'Emulsi'),
(10, 'Galenik');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_penyuplai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `id_jenis`, `id_penyuplai`) VALUES
(1, 'Panadol', 2, 1),
(2, 'Apex', 2, 3),
(3, 'Namex', 1, 3),
(4, 'Quangqong', 8, 7),
(5, 'Taro', 3, 4),
(6, 'Soffell', 8, 10),
(7, 'Antangin', 5, 5),
(8, 'Kenko', 10, 2),
(9, 'Benedict', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_pasien`
--

INSERT INTO `obat_pasien` (`id`, `id_pasien`, `id_obat`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 1, 4),
(4, 8, 3),
(5, 5, 3),
(6, 6, 2),
(7, 10, 6),
(8, 8, 2),
(9, 6, 7),
(10, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `id_detail`) VALUES
(1, 'John Doe', 1),
(3, 'Jen Doe', 2),
(4, 'Mark', 3),
(5, 'Clarice', 4),
(6, 'Vanesa', 5),
(7, 'Matthew', 6),
(8, 'Robert', 7),
(9, 'Grace', 8),
(10, 'Frank', 9),
(11, 'Jono', 10);

-- --------------------------------------------------------

--
-- Table structure for table `penyuplai_obat`
--

CREATE TABLE `penyuplai_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyuplai_obat`
--

INSERT INTO `penyuplai_obat` (`id`, `nama`, `alamat`) VALUES
(1, 'Kimia Farma', 'Jakarta'),
(2, 'Kikayu GLobal Sentosa', 'Jakarta'),
(3, 'PT Jaya Utama Santikah ', 'Tangerang'),
(4, 'Dunia Cakrawala Abadi', 'Jakarta'),
(5, 'PT. Haecho Cell Beautque Manis ', 'Jakarta'),
(6, 'PT. Sumber Energi Alternatif', 'Jakarta'),
(7, 'Cangjia Inc', 'China'),
(8, 'PT. Subur Anguerah Indonesia', 'Tangerang'),
(9, 'PT. Podo Mekar Jaya Indonesia', 'Surabaya'),
(10, 'PT. Bina Mitra Jaya Bersama', 'Sidoarjo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pasien`
--
ALTER TABLE `detail_pasien`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_penyuplai` (`id_penyuplai`),
  ADD KEY `fk_jenis_obat` (`id_jenis`);

--
-- Indexes for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_pasien` (`id_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_detail` (`id_detail`);

--
-- Indexes for table `penyuplai_obat`
--
ALTER TABLE `penyuplai_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pasien`
--
ALTER TABLE `detail_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penyuplai_obat`
--
ALTER TABLE `penyuplai_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_jenis_obat` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`),
  ADD CONSTRAINT `fk_penyuplai` FOREIGN KEY (`id_penyuplai`) REFERENCES `penyuplai_obat` (`id`);

--
-- Constraints for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`id_detail`) REFERENCES `detail_pasien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
