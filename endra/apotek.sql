-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 04:59 AM
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
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `nama`, `alamat`, `no_telepon`) VALUES
(1, 'PT Kalbe Farma Tbk', 'Jakarta, Indonesia', '02137534859'),
(2, 'PT Tempo', 'Jakarta, Indonesia', '0215322483593'),
(3, 'PT Biofarma', 'Bekasi, Indonesia', '0894321314'),
(4, 'PT Sanbe Farma', 'Bandung, Indonesia', '02142453854'),
(5, 'PT Dexa Medica', 'Bekasi, Indonesia', '021757654'),
(6, 'PT Anugerah Pharmindo Lestari (APL)', 'Jl. Pulau Lentutkav II E/4 Kawasan Pulau Gadung, Jakarta Timur.', '0214608820'),
(7, 'PT Brataco', 'Jl. Mangga Besar V/5 Jakarta Barat.', '0216120312'),
(8, 'PT. Enseval Putra Megatrading', 'Jl. Pulo Letut No.10 Pulo Gadung Jakarta Timur.', '02146822422'),
(9, 'PT Merapi Utama Farma', 'Jl. Cilosari No. 25 Cikini, Jakarta Pusat. ', '021-3141906'),
(10, 'PT Bayer Kimia Farmasindo', 'Jl. Raya Bogor Km 28 Jakarta Timur.', '021 8710421');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `fungsi` text NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `fungsi`, `id_distributor`, `tanggal_kadaluarsa`, `harga`) VALUES
(3, 'panadol', 'Panadol adalah obat yang mengandung paracetamol sebagai bahan aktif utamanya. Obat ini mengkombinasikan paracetamol dengan bahan aktif lain seperti dextromethorphan, phenylephrine, dan pseudoephedrin. Panadol dapat digunakan untuk meredakan sakit kepala, sakit gigi, demam, flu, hidung tersumbat, batu tidak berdahak, dan bersin-bersin.', 7, '2025-07-31', 5000),
(4, 'paracetamol', 'Paracetamol adalah obat yang dapat digunakan untuk menurunkan demam dan mengobati rasa sakit dengan intensitas ringan hingga sedang. Beberapa masalah yang dapat diatasi dengan konsumsi parasetamol termasuk sakit kepala, sakit gigi, keseleo, demam, dan gejala flu lainnya.', 1, '2024-07-28', 3000),
(5, 'Bodrex', 'Bodrex adalah obat yang bermanfaat untuk meringankan sakit kepala, sakit gigi, dan demam. Selain itu, obat ini juga memiliki varian yang ditujukan untuk  meredakan gejala flu, seperti bersin, hidung tersumbat, batuk berdahak, atau batuk kering.', 5, '2024-07-29', 3000),
(6, 'Tolak Angin', 'Tolak Angin adalah obat herbal yang berguna untuk meredakan masuk angin, perut mual, tenggorokan kering dan badan terasa dingin', 4, '2022-07-25', 1000),
(7, 'Adem Sari', 'Adem Sari bermanfaat untuk meredakan gejala panas dalam, seperti sariawan, sakit tenggorokan, dan susah buang air besar. Selain itu, produk ini juga dipercaya dapat membantu meredakan gejala flu', 6, '2022-07-13', 1000),
(8, 'Amoxicillin', 'Amoxicillin adalah obat antibiotik untuk mengatasi penyakit akibat infeksi bakteri, seperti otitis media, gonore, atau pielonefritis. Obat ini juga sering digunakan bersama obat proton pump inhibitors (PPIs) untuk menangani tukak lambung yang disebabkan bakteri H. pylori.', 3, '2024-07-31', 2000),
(9, 'Betadine', 'Betadine adalah produk antiseptik yang bermanfaat untuk mencegah pertumbuhan dan membunuh kuman penyebab infeksi. Obat antiseptik ini tersedia dalam bentuk cairan, salep, semprot, dan stik.', 8, '2023-07-08', 5000),
(10, 'Antangin', 'Antangin adalah produk herbal yang bermanfaat untuk mengatasi masuk angin, mual, perut kembung, badan meriang, serta kelelahan. Antangin dijual bebas di apotek atau supermarket dalam bentuk sirop, tablet, dan permen. ', 9, '2023-07-13', 2000),
(11, 'Balsem Lang', 'Balsem Lang bermanfaat untuk meredakan pusing, masuk angin, pegal-pegal, nyeri sendi, keseleo, melegakan pernapasan, dan mabuk perjalanan. Selain itu, produk ini bisa digunakan untuk mengobati gatal-gatal akibat gigitan serangga.', 5, '2025-07-25', 5000),
(12, 'Diapet', 'Diapet adalah produk herbal yang bermanfaat untuk mengobati diare, mengurangi frekuensi buang air besar, memadatkan feses yang cair, dan meredakan rasa mulas akibat diare. Ada tiga jenis produk Diapet yang dijual secara bebas di pasaran, yaitu Diapet, Diapet Anak, dan Diapet NR.', 2, '2023-07-05', 3000),
(13, 'Balsem Lang', 'Balsem Lang bermanfaat untuk meredakan pusing, masuk angin, pegal-pegal, nyeri sendi, keseleo, melegakan pernapasan, dan mabuk perjalanan. Selain itu, produk ini bisa digunakan untuk mengobati gatal-gatal akibat gigitan serangga.', 10, '2025-07-25', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dk_apotek` (`id_distributor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `dk_apotek` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
