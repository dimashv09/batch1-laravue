-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`, `id_anggota`) VALUES
(1, 'YutsuriHisekawa', 'YutsuriHisekawa', 1),
(2, 'Yutsuri', 'Yutsuri', 2),
(3, 'Imako', 'Imako', 3),
(4, 'Salad', 'Salad', 4),
(5, 'Salsa', 'Salsa', 5),
(6, 'Suki', 'Suki', 6),
(7, 'Aki', 'Aki', 7),
(8, 'Yama', 'Yama', 8),
(9, 'Yuki', 'Yuki', 9),
(10, 'Yudi', 'Yudi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `sex`, `telp`, `alamat`, `email`, `tgl_entry`) VALUES
(1, 'YutsuriHisekawa', 'L', '08XXXX', 'SURABAY', 'yutsurixxxx', '2022-11-01 03:02:36'),
(2, 'Yutsuri', 'P', '08XXX', 'SULAWESI', 'SULAWESIXXXXX', '2022-11-02 03:02:36'),
(3, 'Yoimiya', 'L', '08XXXXXX', 'DEPOK', 'BALIXXXXX', '2022-11-03 03:02:36'),
(4, 'Hotaru', 'P', '08XXX', 'PALEMBANG', 'Palembangxxxxx', '2022-11-04 03:02:36'),
(5, 'FANTECH', 'L', '08XXXX', 'TOKYO', 'Gulun', '2022-11-05 03:02:36'),
(6, 'Made', 'L', '08XXX', 'IN CHINA', 'CHINA XXXX', '2022-11-06 03:02:36'),
(7, 'OPAK', 'P', '08XXXX', 'BANDUNG ', 'BANDUNGXXXXXX', '2022-11-07 03:02:36'),
(8, 'BILLA', 'P', '08XXXX', 'PAPUA', 'PAPUAXXXXX', '2022-11-08 03:02:36'),
(9, 'ANATA', 'L', '085XXXXXX', 'OSAKA', 'OSAKAXXXXXX', '2022-11-09 03:02:36'),
(10, 'NANDA', 'L', '08XXXXX', 'GERMAN', 'GERMANXXXXX', '2022-11-10 03:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(25) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` varchar(8) NOT NULL,
  `id_pengarang` varchar(8) NOT NULL,
  `id_katalog` varchar(3) NOT NULL,
  `qty_stock` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stock`, `harga_pinjam`) VALUES
('ISBN01', 'Pengembala', 2001, '01', '01', '01', 10, 5000),
('ISBN02', 'Pengembala01', 2002, '02', '02', '02', 11, 5000),
('ISBN03', 'Pengembala03', 2003, '03', '03', '03', 12, 5000),
('ISBN04', 'Pengembala04', 2004, '04', '04', '04', 13, 5000),
('ISBN05', 'Pengembala05', 2005, '05', '05', '05', 14, 5000),
('ISBN06', 'Pengembala06', 2006, '06', '06', '06', 15, 5000),
('ISBN07', 'Pengembala07', 2007, '07', '07', '07', 16, 5000),
('ISBN08', 'Pengembala08', 2008, '08', '08', '08', 17, 5000),
('ISBN09', 'Pengembala09', 2009, '09', '09', '09', 18, 5000),
('ISBN10', 'Pengembala10', 2010, '10', '10', '10', 19, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_pinjam`, `isbn`, `qty`) VALUES
(1, 'ISBN01', 1),
(2, 'ISBN02', 2),
(3, 'ISBN03', 3),
(4, 'ISBN04', 4),
(5, 'ISBN05', 5),
(6, 'ISBN06', 6),
(7, 'ISBN07', 7),
(8, 'ISBN08', 8),
(9, 'ISBN09', 9),
(10, 'ISBN10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` varchar(3) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES
('01', 'PETUALANG01'),
('02', 'PETUALANG02'),
('03', 'PETUALANG03'),
('04', 'PETUALANG04'),
('05', 'PETUALANG05'),
('06', 'PETUALANG06'),
('07', 'PETUALANG07'),
('08', 'PETUALANG08'),
('09', 'PETUALANG09'),
('10', 'PETUALANG10');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id_panjam` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id_panjam`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 1, '2022-11-01', '2022-11-01'),
(2, 2, '2022-11-02', '2022-11-02'),
(3, 3, '2022-11-03', '2022-11-03'),
(4, 4, '2022-11-04', '2022-11-04'),
(5, 5, '2022-11-05', '2022-11-05'),
(6, 6, '2022-11-06', '2022-11-06'),
(7, 7, '2022-11-07', '2022-11-07'),
(8, 8, '2022-11-08', '2022-11-08'),
(9, 9, '2022-11-09', '2022-11-09'),
(10, 10, '2022-11-10', '2022-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES
('01', 'PT.MSI', 'MSI_@GMAIL.COM', '08XXAXX', 'MSI CITY'),
('02', 'PT.RADEON', 'RADEEON@GMAIL.COM', '08XXX', 'AMD CITY'),
('03', 'PT.INTEL', 'INTEL@GMAIL.COM', '08XXXXX', 'INTELCITY'),
('04', 'PT.AFTERBNUNNER', 'AFTERBUNNER@GMAIL.COM', '08XXX', 'AFTERBUNNER CITY'),
('05', 'CV.GERMAN', 'GERMANY@GMAIL.COM', '08XXXX', 'GERMAN'),
('06', 'PT.SPANINS', 'SPANYOL@GMAIL.COM', '08XXX', 'SPANYOL'),
('07', 'CV.BANDUNG', 'BANDUNG@GMAIL.COM', '08XXXX', 'BANDUNG'),
('08', 'PT.MADIUN_CITY', 'MADIUN@GMAIL.COM', '08XXXX', 'MADIUN CITY'),
('09', 'PT.NYC', 'nyc@gmail.com', '085XXXXXX', 'NYC'),
('10', 'PT.FANTECH', 'kuunogawa@gmail.com', '08XXXXX', 'tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(8) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES
('01', 'Jabami', 'Jabami@gmail.com', '08XXXX', 'JabamiCity'),
('02', 'Yumeko', 'Yumeko@gmail.com', '088xxxxx', 'YumekoCIty'),
('03', 'Fantech', 'fantech@gmai.com', '08XXXXXX', 'FantechCity'),
('04', 'Rem', 'Rem@gmail.com', '08XXX', 'RemRomCity'),
('05', 'scorpio', 'scorpio@gmail.com', '08XXXX', 'scorpio city'),
('06', 'naru', 'naru@gmail.com', '08XXX', 'narucity'),
('07', 'namida', 'namida@gmail.com', '08XXXX', 'namidacity'),
('08', 'kasuga', 'kasuga@gmail.com', '08XXXX', 'kasugacity'),
('09', 'demo', 'demo@gmail.com', '085XXXXXX', 'democity'),
('10', 'itai', 'itai@gmail.com', '08XXXXX', 'itaicity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`Username`),
  ADD UNIQUE KEY `Username_2` (`Username`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Username_3` (`Username`),
  ADD KEY `Username_4` (`Username`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `id_katalog` (`id_katalog`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_pengarang` (`id_pengarang`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_panjam`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_panjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjam` (`id_panjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `buku` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
