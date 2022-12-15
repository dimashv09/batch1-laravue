-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 08:34 AM
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
-- Database: `apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(32) NOT NULL,
  `specialist` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `No_Tlfn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `specialist`, `alamat`, `No_Tlfn`) VALUES
('01', 'Yuuki', 'Bedah', 'Jatim', '08xxx'),
('02', 'alfin', 'anak', 'jatim', '08xxx'),
('03', 'yuma', 'umum', 'jatim', '08xxx'),
('04', 'kuuma akuma', 'kandungan', 'jateng', '08xxxx'),
('05', 'Yuuki', 'Bedah', 'Jatim', '08xxx'),
('06', 'alfin', 'anak', 'jatim', '08xxx'),
('07', 'yuma', 'umum', 'jatim', '08xxx'),
('08', 'kuuma akuma', 'kandungan', 'jateng', '08xxxx'),
('09', 'yuma', 'umum', 'jatim', '08xxx'),
('10', 'kuuma akuma', 'kandungan', 'jateng', '08xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('1', 'Paramex', 'Pusing'),
('10', 'Hypo', 'Jantung'),
('2', 'Paracetamol', 'Obat demam'),
('3', 'panadol', 'Pusing'),
('4', 'Hypo', 'Jantung'),
('5', 'Paramex', 'Pusing'),
('6', 'Paracetamol', 'Obat demam'),
('7', 'panadol', 'Pusing'),
('8', 'Hypo', 'Jantung'),
('9', 'panadol', 'Pusing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomer_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomer_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
('01', '1000', 'Yukimura', 'Laki Laki', 'Jatim', '08xxxxxx'),
('02', '1001', 'Neko', 'perempuan', 'Jabar', '08xxxxxx'),
('03', '1003', 'Kumi', 'Laki Laki', 'Jatim', '08xxxxxx'),
('04', '1004', 'Usagi', 'perempuan', 'Jabar', '08xxxxxx'),
('05', '1005', 'Yukimura', 'Laki Laki', 'Jatim', '08xxxxxx'),
('06', '1006', 'Neko', 'perempuan', 'Jabar', '08xxxxxx'),
('07', '1007', 'Kumi', 'Laki Laki', 'Jatim', '08xxxxxx'),
('08', '1008', 'Usagi', 'perempuan', 'Jabar', '08xxxxxx'),
('09', '1009', 'Kumi', 'Laki Laki', 'Jatim', '08xxxxxx'),
('10', '1010', 'Usagi', 'perempuan', 'Jabar', '08xxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(32) NOT NULL,
  `pekerjaan` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `No_Tlfn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `pekerjaan`, `alamat`, `No_Tlfn`) VALUES
('01', 'Udin', 'OB', 'Jatim', '08xxx'),
('02', 'umar', 'admin', 'jatim', '08xxx'),
('03', 'uki', 'OG', 'bandung', '08xxxx'),
('04', 'erika', 'admin', 'Surakarta', '08xxxx'),
('05', 'Elfin', 'admin', 'Surabaya', '08xxx'),
('06', 'riko', 'ob', 'banyuwangi', '08xxxxxx'),
('07', 'Fantech', 'admin', 'Madiun', ''),
('08', 'Kazuha', 'Penjaga Toilet', 'Surabaya', '08xxxx'),
('09', 'MSI', 'teknisi', 'Madura', '08xxxxx'),
('10', 'Xin Ji Ping', 'OB', 'Ngawi', '08xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perawat`
--

CREATE TABLE `tb_perawat` (
  `id_perawat` varchar(50) NOT NULL,
  `nama_perawat` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telfon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perawat`
--

INSERT INTO `tb_perawat` (`id_perawat`, `nama_perawat`, `alamat`, `no_telfon`) VALUES
('005', 'Susanti', 'jatim', '08xxxxx'),
('01', 'Susanti', 'jatim', '08xxxxx'),
('02', 'mei mei', 'jateng', '08xxxx'),
('03', 'sunarto', 'jabar', '08xxxx'),
('04', 'yuuuma', 'kaltim', '08xxxx'),
('06', 'mei mei', 'jateng', '08xxxx'),
('07', 'sunarto', 'jabar', '08xxxx'),
('08', 'yuuuma', 'kaltim', '08xxxx'),
('09', 'sunarto', 'jabar', '08xxxx'),
('10', 'yuuuma', 'kaltim', '08xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('01', 'poli gigi', 'utama'),
('010', 'poli gizi', 'utama'),
('02', 'poli umum', 'utama'),
('03', 'poli anak', 'utama'),
('04', 'poli kakek', 'utama'),
('05', 'poli nenek', 'utama'),
('06', 'poli kb', 'utama'),
('07', 'poli obat', 'utama'),
('08', 'poli gizi', 'utama'),
('09', 'poli obat', 'utama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_perawat` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `id_perawat`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('01', '01', 'Sakit', '01', '01', 'sakit keras', '01', '2022-11-01'),
('02', '02', 'sakit keras', '02', '02', 'sakit banget', '02', '2022-11-02'),
('03', '03', 'Sakit', '03', '03', 'sakit keras', '03', '2022-11-01'),
('04', '04', 'sakit keras', '04', '04', 'sakit banget', '04', '2022-11-02'),
('05', '05', 'Sakit', '05', '005', 'sakit keras', '05', '2022-11-01'),
('06', '06', 'sakit keras', '06', '06', 'sakit banget', '06', '2022-11-02'),
('07', '07', 'Sakit', '07', '07', 'sakit keras', '07', '2022-11-01'),
('08', '08', 'sakit keras', '08', '08', 'sakit banget', '08', '2022-11-02'),
('09', '09', 'Sakit', '09', '09', 'sakit keras', '09', '2022-11-01'),
('10', '10', 'sakit keras', '10', '10', 'sakit banget', '010', '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
('01', 'Yoimiya', 'dokter007123', 'dokter007123'),
('02', 'yuuki', 'yuuki007123', 'yuuki007123'),
('03', 'Yoimiya', 'dokter007123', 'dokter007123'),
('04', 'yuuki', 'yuuki007123', 'yuuki007123'),
('05', 'Yoimiya', 'dokter007123', 'dokter007123'),
('06', 'yuuki', 'yuuki007123', 'yuuki007123'),
('07', 'Yoimiya', 'dokter007123', 'dokter007123'),
('08', 'yuuki', 'yuuki007123', 'yuuki007123'),
('09', 'Yoimiya', 'dokter007123', 'dokter007123'),
('10', 'yuuki', 'yuuki007123', 'yuuki007123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_pegawai`
--

CREATE TABLE `tb_user_pegawai` (
  `id_user` varchar(50) NOT NULL,
  `user_pegawai` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_perawat`
--

CREATE TABLE `tb_user_perawat` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_perawat`
--
ALTER TABLE `tb_perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_perawat` (`id_perawat`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_pegawai`
--
ALTER TABLE `tb_user_pegawai`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_perawat`
--
ALTER TABLE `tb_user_perawat`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_4` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekammedis_ibfk_5` FOREIGN KEY (`id_perawat`) REFERENCES `tb_perawat` (`id_perawat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user_pegawai`
--
ALTER TABLE `tb_user_pegawai`
  ADD CONSTRAINT `tb_user_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user_perawat`
--
ALTER TABLE `tb_user_perawat`
  ADD CONSTRAINT `tb_user_perawat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_perawat` (`id_perawat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
