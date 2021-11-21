-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 10:23 AM
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

--
-- Dumping data for table `detil_obat`
--

INSERT INTO `detil_obat` (`id`, `nama`, `id_jenis`, `kadaluarsa`, `kandungan`) VALUES
(1, 'abacavir', 1, 'baik sebelum 2024', 'Abacavir bekerja dengan cara menghambat proses replikasi atau perkembangbiakan virus HIV, sehingga jumlah virus HIV di dalam darah menurun. Cara kerja ini dapat meningkatkan sistem kekebalan tubuh penderita HIV dan menurunkan risiko terjadinya komplikasi dan penyakit yang berkaitan dengan infeksi HIV/AIDS, seperti sarkoma Kaposi atau kanker.'),
(2, 'ampicilin', 2, 'baik sebelum 2025', 'Ampicillin termasuk ke dalam antibiotik golongan penisilin. Obat ini bekerja dengan cara membunuh bakteri penyebab infeksi. Obat ini tidak dapat digunakan untuk mengobati infeksi virus, seperti flu dan pilek.'),
(8, 'antangin', 2, 'baik sebelum 2024', 'Antangin mengandung beberapa bahan herbal, yaitu jahe, daun sembung, ginseng, peppermint, akar manis, biji pala, meniran, kunyit, daun mint, dan royal jelly, serta madu. Kombinasi semua bahan tersebut dipercaya bisa mengatasi masuk angin, menghangatkan tubuh, sekaligus meningkatkan daya tahan tubuh.'),
(9, 'antibiotik', 2, 'baik sebelum 2025', 'Antibiotik bekerja dengan cara menghambat pertumbuhan, perkembangbiakan bakteri, atau membunuh sel bakteri. Dengan begitu, infeksi bakteri bisa teratasi. Penggunaan antibiotik tidak boleh sembarangan karena bisa meningkatkan risiko terjadinya resistensi atau kekebalan terhadap antibiotik.'),
(10, 'apixaban', 1, 'baik sebelum 2026', 'Apixaban merupakan antikoagulan yang bekerja dengan cara menghalangi faktor Xa dalam proses pembekuan darah. Dengan begitu, terbentuknya gumpalan darah atau bekuan darah yang menyumbat pembuluh darah dan menyebabkan terjadinya komplikasi serius bisa dicegah.'),
(11, 'argine', 2, 'baik sebelum 2024', 'Secara alami, arginine bisa diperoleh dengan rutin mengonsumsi makanan yang mengandung protein, seperti daging merah, daging ayam, ikan, produk olahan susu, kedelai, gandum utuh, atau kacang-kacangan.'),
(12, 'antipsikotik', 2, 'baik sebelum 2024', 'Antipsikosik tersedia dalam bentuk tablet, sirop, atau suntik. Obat ini hanya dapat digunakan sesuai resep dokter. Perlu dipahami, obat antipsikotik tidak bisa menyembuhkan penyakit gangguan mental.'),
(13, 'Aripiprazole', 1, 'baik sebelum 2024', 'Aripiprazole bekerja dengan cara mengembalikan keseimbangan zat kimia alami di dalam otak yang memengaruhi suasana hati dan perilaku. Dengan begitu, gejala skizofrenia, seperti halusinasi, perubahan emosi yang tiba-tiba, atau gangguan perilaku dan cara berpikir, bisa mereda.'),
(14, 'Asenapine', 2, 'baik sebelum 2025', 'Asenapine merupakan obat antipsikotik atipikal yang bekerja dengan cara mengembalikan keseimbangan neurotransmiter, yaitu zat alami yang ada di otak. Dengan begitu, gejala seperti halusinasi atau perubahan mood atau suasana perasaan dapat mereda.'),
(15, 'Aspirin', 1, 'baik sebelum 2025', 'Aspirin merupakan obat golongan antiinflamasi nonsteroid yang bekerja untuk mencegah pembentukan prostaglandin melalui jalur COX-1 inhibitor. Selain itu, obat ini juga bisa bekerja mencegah terbentuknya gumpalan darah (antiplatelet).');

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
(1, 'syrup', 'dI minum aja'),
(2, 'kapsul', 'diminum dengan air');

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

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `id_detil`, `id_rak`) VALUES
(1, 'abacavir', 1, 1),
(2, 'ampicilin', 2, 2),
(3, 'antangin', 8, 2),
(4, 'antibiotik', 9, 2),
(5, 'antipsikotik', 12, 2),
(6, 'apixaban', 10, 1),
(7, 'argine', 11, 2),
(8, 'Aripiprazole', 13, 1),
(9, 'Asenapine', 14, 2),
(10, 'Aspirin', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_pasien`
--

INSERT INTO `obat_pasien` (`id`, `id_obat`, `id_pasien`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 4),
(4, 10, 10),
(5, 7, 5),
(6, 3, 3),
(7, 9, 9),
(8, 5, 6),
(9, 6, 8),
(10, 2, 7);

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

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `penyakit`, `nama_obat`) VALUES
(1, 'anis ayu', 'cimahi', 'batuk', 1),
(2, 'beni arman', 'cimahi', 'batuk', 1),
(3, 'indah deden', 'cicalengka', 'pusing', 3),
(4, 'andini', 'bandung', 'pilek', 4),
(5, 'dini', 'bandung', 'magg', 7),
(6, 'ratih', 'bandung', 'pilek', 5),
(7, 'tri', 'cimahi', 'batuk', 2),
(8, 'sulistiya', 'cimahi', 'pusing', 6),
(9, 'karsono', 'bandung', 'pilek', 9),
(10, 'dadan', 'cicalengka', 'demam', 10);

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
(1, 'satu', 2),
(2, 'dua', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
