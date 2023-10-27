-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 06:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlpn` int(11) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_pelanggan`, `alamat`, `no_tlpn`, `umur`) VALUES
(1, 'M riko', 'jl telaga 1 ', 876662542, 23),
(2, 'm rudi', 'jl suka hati', 87656533, 20),
(3, 'sucia febri', 'jl jalan aja dulu', 867654355, 24),
(4, 'iga auliani', 'jl sayang aja', 877666515, 56),
(5, 'titin ', 'jl cinta ', 877881888, 30),
(6, 'sela marsia', 'jl terus jadian ga', 98665567, 24),
(7, 'muhammad', 'jl jalan ke', 87777888, 40),
(8, 'sandiaga', 'jl sama kamu', 77667899, 29),
(9, 'arsyad', 'jl pekayon', 877632762, 22),
(10, 'alya', 'jl pasar', 8736667, 50);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaction`
--

INSERT INTO `detail_transaction` (`id`, `id_transaksi`, `id_obat`, `jumlah_item`, `subtotal`) VALUES
(1, 1, 1, 2, 60000),
(2, 5, 6, 1, 15000),
(3, 4, 5, 2, 80000),
(4, 3, 7, 2, 60000),
(5, 6, 1, 6, 90000),
(6, 3, 2, 7, 280000),
(7, 8, 10, 2, 50000),
(8, 4, 7, 4, 40000),
(9, 3, 7, 2, 15000),
(10, 2, 6, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `jenis_obat` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `nama_obat`, `jenis_obat`, `harga`, `jumlah_stok`) VALUES
(1, 'obat batuk', 'pereda', 35000, 4),
(2, 'obat pusing', 'pereda', 40000, 5),
(3, 'obat maag', 'keras', 47000, 5),
(4, 'obat sakit gigi', 'sedang', 13000, 9),
(5, 'obat mual', 'pereda', 40000, 8),
(6, 'obat gatal', 'pereda', 15000, 10),
(7, 'obat pembersih mata', 'pereda', 30000, 6),
(8, 'obat sakit mata', 'pereda', 40000, 7),
(9, 'obat flu', 'pereda', 5000, 21),
(10, 'obat tetes kuping', 'keras', 15000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(32) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_tlpn_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat_supplier`, `no_tlpn_supplier`) VALUES
(1, 'PT MAJU TERUS', 'jl cakung', 21344455),
(2, 'PT MAKMUR JAYA', 'jl. raya bogor', 21377888),
(3, 'PT PANTANG MUNDUR', 'jl. kelinci', 21334449),
(4, 'PT JADI KAYA', 'JL KENANGNA', 8999992);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_obat`
--

CREATE TABLE `supplier_obat` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `tahun_bergabung` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_obat`
--

INSERT INTO `supplier_obat` (`id`, `id_supplier`, `id_obat`, `tahun_bergabung`) VALUES
(1, 1, 6, 2021),
(2, 2, 10, 2022),
(3, 3, 1, 2020),
(4, 4, 9, 2022),
(5, 2, 2, 2023),
(6, 3, 3, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `tanggal_transaksi`, `id_pelanggan`, `jumlah`) VALUES
(1, '2023-10-05', 5, 3),
(2, '2023-10-11', 4, 2),
(3, '2023-10-17', 3, 6),
(4, '2023-10-29', 2, 5),
(5, '2023-10-25', 7, 2),
(6, '2023-10-20', 6, 8),
(7, '2023-09-06', 10, 1),
(8, '2023-09-30', 8, 6),
(9, '2023-09-13', 9, 7),
(10, '2023-09-05', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_obat`
--
ALTER TABLE `supplier_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplier` (`id_supplier`),
  ADD KEY `fk_id_obat` (`id_obat`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_obat`
--
ALTER TABLE `supplier_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD CONSTRAINT `detail_transaction_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_transaction_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `medicine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplier_obat`
--
ALTER TABLE `supplier_obat`
  ADD CONSTRAINT `fk_id_obat` FOREIGN KEY (`id_obat`) REFERENCES `medicine` (`id`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
