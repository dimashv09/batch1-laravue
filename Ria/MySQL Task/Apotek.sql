-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 11:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `kode_Obat` int(11) NOT NULL,
  `Kode_Transaksi` int(11) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `kode_Obat`, `Kode_Transaksi`, `Harga`) VALUES
(1, 30101, 101, 8000),
(2, 601003, 102, 200000),
(3, 30101, 103, 8000),
(4, 20101, 104, 12000),
(5, 101002, 105, 50000),
(6, 10101, 106, 400000),
(7, 601002, 107, 300000),
(8, 10102, 108, 150000),
(9, 701004, 109, 15000),
(10, 501003, 110, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `kode_Kategori` int(11) NOT NULL,
  `Nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`kode_Kategori`, `Nama_kategori`) VALUES
(10001, 'Obat Bebas'),
(10002, 'Obat Bebas Terbatas'),
(10003, 'Obat Keras'),
(10004, 'Obat Golongan Narkotika'),
(10005, 'Obat Fitofarmaka'),
(10006, 'Obat Psikotropika'),
(10007, 'Obat Wajib Apotek (OWA)'),
(10008, 'Obat Luar'),
(10009, 'Obat Herbal Terstandar (OHT)'),
(10010, 'Obat Herbal (Jamu)');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `Kode_Obat` int(11) NOT NULL,
  `Kode_Kategori` int(11) NOT NULL,
  `Kode_Supplier` int(11) NOT NULL,
  `Nama_Barang` varchar(100) NOT NULL,
  `Deskripsi_Singkat` varchar(255) DEFAULT NULL,
  `Tanggal_Expired` date NOT NULL,
  `Harga_Supplier` int(11) NOT NULL,
  `Harga_Grosir` int(11) NOT NULL,
  `Harga_User` int(11) NOT NULL,
  `Stok_Barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`Kode_Obat`, `Kode_Kategori`, `Kode_Supplier`, `Nama_Barang`, `Deskripsi_Singkat`, `Tanggal_Expired`, `Harga_Supplier`, `Harga_Grosir`, `Harga_User`, `Stok_Barang`) VALUES
(10101, 10001, 100001, 'Paracetamol', 'Parasetamol atau asetaminofen adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.', '2024-05-08', 4000, 4500, 5000, 500),
(10102, 10001, 100002, 'Antasida', 'Antasida (antacid) adalah obat untuk meredakan gejala akibat sakit maag atau penyakit asam lambung.', '2025-05-28', 3000, 3500, 4000, 900),
(10103, 10001, 100003, 'Laktulosa', 'obat untuk mengatasi konstipasi atau sulit buang air besar.', '2023-05-03', 5000, 5500, 6000, 150),
(10104, 10001, 100004, 'Attapulgite', 'obat untuk meredakan diare.', '2023-05-24', 3500, 4000, 4500, 500),
(10105, 10001, 100005, 'Bronsolvan', 'Obat untuk mengatasi dan meringankan seranngan asma bronkial.', '2025-05-07', 5000, 5500, 6000, 200),
(20101, 10002, 100006, 'CTM', 'obat anti alergi yang mengandung zat aktif Chlorpheniramine maleat.', '2024-05-16', 3000, 3500, 4000, 150),
(20102, 10002, 100007, 'Theophylline', 'Theophylline atau teofilin adalah obat untuk meredakan gejala akibat penyempitan saluran napas (bronkospame)', '2025-05-08', 4000, 4500, 5000, 200),
(20103, 10002, 100008, 'Tremenza', 'Obat dengan kandungan Pseudoephedrine HCl dan Triprolidine HCl. Obat ini digunakan untuk meringankan gejala-gejala flu.', '2023-05-24', 3500, 4000, 4500, 250),
(20104, 10002, 100009, 'Lactobion', 'obat yang digunakan untuk mengatasi gangguan pada saluran pencernaan seperti gastritis, perut kembung, maag', '2023-05-08', 3000, 3500, 4000, 200),
(20105, 10002, 100010, 'Decolgen', 'Obat flu dengan kandungan Paracetamol, Phenylpropanolamine HCl, dan Chlorpheniramine maleate.', '2024-05-21', 2000, 2500, 3000, 500),
(30101, 10003, 100011, 'Amoxicillin', 'Obat antibiotika', '2022-05-09', 3000, 3500, 4000, 400),
(30102, 10003, 100012, 'Sulfadiazin', 'Obat anti bakteri', '2022-05-03', 3000, 3500, 4000, 50),
(30103, 10003, 100013, 'Meprobamatum', 'obat penenang (tranquilizer).', '2028-05-09', 4000, 4500, 5000, 30),
(30104, 10003, 100014, 'Indomethacinum', 'obat rheumatik.', '2026-05-18', 5000, 5500, 6000, 70),
(30105, 10003, 100015, 'Reserpinum', 'obat anti hipertensi.', '2026-05-12', 6000, 6500, 7000, 60),
(40101, 10004, 100016, 'heroina', 'Narkotika golongan I obat candu yang menekan beberapa fungsi sistem saraf pusat, seperti detak jantung, tekanan darah, respirasi, dan pengaturan suhu.', '2023-05-16', 50000, 55000, 60000, 20),
(40102, 10004, 100017, 'Morfin', 'Narkotika golongan II obat untuk menghilangkan rasa nyeri dengan intensitas sedang hingga parah, seperti nyeri pada kanker atau serangan jantung.', '2023-05-15', 60000, 65000, 70000, 10),
(40103, 10004, 100018, 'Petidin', 'Narkotika golongan II obat opioid yang digunakan untuk meredakan nyeri sedang hingga parah.', '2024-05-14', 80000, 85000, 90000, 5),
(40104, 10004, 100019, 'Methadone', 'Narkotika golongan III obat untuk meredakan nyeri berat dan mengobati ketergantungan opioid.', '2023-05-16', 90000, 95000, 100000, 10),
(40105, 10004, 100020, 'Buprenorphine', 'Narkotika golongan III obat untuk mengobati gangguan penggunaan opioid, nyeri akut, dan nyeri kronis. ', '2027-05-13', 150000, 155000, 160000, 5),
(101001, 10010, 100046, 'Rapet wangi', NULL, '2024-05-14', 4000, 4500, 5000, 50),
(101002, 10010, 100047, 'Buyung upik', NULL, '2026-05-20', 3500, 4000, 5000, 25),
(101003, 10010, 100048, 'Enkasari', NULL, '2026-05-13', 4500, 5000, 5500, 35),
(101004, 10010, 100049, 'Beras Kencur', NULL, '2023-05-09', 4500, 5000, 5500, 45),
(101005, 10010, 100050, ' Pegal linu', NULL, '2028-05-11', 3000, 3500, 4000, 30),
(501001, 10005, 100021, 'Stimuno', 'obat yang berfungsi untuk meningkatkan daya tahan tubuh (sistem imun).', '2022-05-10', 55000, 60000, 65000, 150),
(501002, 10005, 100022, 'Tensigard', 'Suplemen herbal yang dapat membantu menstabilkan tekanan darah.', '2025-05-07', 30000, 35000, 40000, 10),
(501003, 10005, 100023, 'X-gra', 'Obat Stamina Pria', '2023-05-03', 20000, 25000, 30000, 10),
(501004, 10005, 100024, 'Nodiar', 'Untuk pengobatan diare non spesifik', '2024-05-22', 4000, 4500, 5000, 20),
(501005, 10005, 100025, 'Inlacin', 'Obat yang digunakan untuk membantu menurunkan kadar glukosa darah.', '2023-05-10', 3000, 3500, 4000, 15),
(601001, 10006, 100026, 'Rohypnol', 'Untuk mengobati keluhan tidur dan dalam frekuensi yang jarang sebagai obat bius.', '2023-05-17', 50000, 55000, 60000, 5),
(601002, 10006, 100027, 'Diazepam', 'Untuk pengobatan kecemasan, sindrom putus alkohol, sindrom putus benzodiazepin, spasmofili, epilepsi, sulit tidur, dan sindrom kaki resah.', '2026-05-20', 60000, 65000, 70000, 5),
(601003, 10006, 100028, 'Amfetamina', 'untuk mengobati gangguan hiperaktif karena kurang perhatian atau Attention-deficit Hyperactivity Disorder pada pasien', '2024-05-09', 70000, 75000, 80000, 6),
(601004, 10006, 100029, 'Methadone', 'Obat yang digunakan untuk menghilangkan rasa sakit dari sedang sampai parah seperti pasca operasi.', '2026-05-06', 75000, 80000, 85000, 8),
(601005, 10006, 100030, 'Phenobarbital', 'Obat untuk mengontrol dan meredakan kejang, yang salah satunya adalah akibat epilepsi.', '2026-05-20', 90000, 95000, 100000, 7),
(701001, 10007, 100031, 'Ibuprofen', 'obat yang tergolong dalam kelompok obat anti-inflamasi nonsteroid dan digunakan untuk mengurangi rasa sakit akibat artritis. Obat ini dijual dengan merk dagang Advil, Motrin, Nuprin, dan Brufen. Ibuprofen diindikasikan sebagai analgesik dan antipiretik.', '2026-05-13', 2000, 2500, 3000, 100),
(701002, 10007, 100032, 'Omeprazol', 'Obat yang digunakan dalam pengobatan penyakit refluks gastroesofagus, ulkus peptikum, dan sindrom Zollinger-Ellison. Obat ini juga digunakan untuk mencegah perdarahan saluran cerna atas pada orang yang berisiko tinggi.', '2027-05-12', 3000, 3500, 4000, 50),
(701003, 10007, 100033, 'Bacitracin', 'Obat antibiotik untuk mengobati luka ringan di kulit.', '2026-05-14', 2500, 3000, 3500, 50),
(701004, 10007, 100034, 'Sulfasaladin', 'obat antiradang yang digunakan untuk meredakan gejala penyakit radang usus, khususnya kolitis ulseratif.', '2024-05-14', 5000, 5500, 6000, 75),
(701005, 10007, 100035, 'Salbutamol', 'Obat yang digunakan membuka saluran napas di paru-paru. Obat ini digunakan untuk mengobati asma, penyempitan bronkus yang dipicu olahraga, dan penyakit paru obstruktif kronis.', '2027-05-19', 6000, 6500, 7000, 80),
(801001, 10008, 100036, 'Callusol', 'Untuk pengobatan mata ikan, kutil, dan kapalan.', '2025-05-21', 4000, 4500, 5000, 50),
(801002, 10008, 100037, 'Betadine', 'Obat luka luar.', '2025-05-15', 6000, 6500, 7000, 1000),
(801003, 10008, 100038, 'Dermovate', 'Untuk meredakan peradangan pada kulit akibat kondisi tertentu.', '2026-05-27', 4000, 4500, 5000, 35),
(801004, 10008, 100039, 'Ultrasiline', 'Obat anti jamur yang digunakan terutama kandidiasis dan pitiriasis versicolor.', '2023-05-06', 6000, 6500, 7000, 30),
(801005, 10008, 100040, 'Oxoferin', 'Obat untuk pemakaian luar tubuh dalam bentuk larutan atau cairan. Obat ini dapat digunakan untuk mengobati penyakit ulkus kaki kronis pada insufisiensi vena.', '2024-05-16', 3000, 3500, 4000, 25),
(901001, 10009, 100041, 'Kiranti', 'Obat pereda nyeri haid.', '2025-05-14', 5000, 5500, 6000, 30),
(901002, 10009, 100042, 'Antangin', 'Obat herbal masuk angin.', '2025-05-15', 2000, 2500, 3000, 100),
(901003, 10009, 100043, 'Diabetkol', 'Obat herbal diabetes.', '2024-05-16', 5000, 5500, 6000, 35),
(901004, 10009, 100044, 'Herbakof', 'Obat batuk herbal.', '2027-05-19', 7000, 7500, 8000, 55),
(901005, 10009, 100045, 'Diapet', 'Obat kapsul untuk mencret.', '2027-05-12', 2500, 3000, 3500, 125);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `Kode_Pembeli` int(11) NOT NULL,
  `Nama_Pembeli` varchar(35) NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `No_Telp` varchar(15) DEFAULT NULL,
  `Email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`Kode_Pembeli`, `Nama_Pembeli`, `Alamat`, `No_Telp`, `Email`) VALUES
(1001, 'Sinta', 'Jakrta Timur', '0895546567', 'shinta123@gmail.com'),
(1002, 'Susanti', 'Tangerang', '08956674354', 'Susantiii6@gmail.com'),
(1003, 'Robi', 'Bekasi', '', ''),
(1004, 'Rahmat', 'Bogor', '085534555667', 'Rahmat56@gmail.com'),
(1005, 'Rahmawati', 'Depok', '', ''),
(1006, 'Chika', 'Cibubur', '08214689i75t9', ''),
(1007, 'Luki', 'Cibinong', '025678890077', 'Liki76@gmail.com'),
(1008, 'Febi', 'Jakarta Selatan', '08776445378', 'Fevi44@gmai.com'),
(1009, 'kurniawan', 'Cikunir', '', ''),
(1010, 'Rio', 'Jakarta Pusat', '08222456789', 'Rio98@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Kode_Supplier` int(11) NOT NULL,
  `Nama_Supplier` varchar(100) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `No_Telp` varchar(35) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Supplier`, `Alamat`, `No_Telp`, `Email`, `Foto`) VALUES
(100002, 'PT. Tiffany Usaha Mandiri', 'Jakarta', '0211028263', 'Tiffany@official.com', NULL),
(100006, 'Apotek Megah Terang', 'Jawa timur', '0218736799877', 'Megahterang@yahoo.com', NULL),
(100010, 'Apotek Harmonis Farma', 'Jawa Timur', '02178347648', 'Harmonisfarma@gmail.com', NULL),
(100011, 'PT.Herbamart', 'Jakarta Pusat', '021874747689', 'Herbamart@official.com', NULL),
(100014, 'PT. Podo Mekar Jaya Santosa', 'Jawa Timur', '', 'PodoMekarJayaSantosa@gmail.com', NULL),
(100017, 'PT.Kimia Farma', 'Jakarta', '0217693276437', 'kimiafarma@official.com', NULL),
(100020, 'PT. MPM Distributor', 'Jakarta Selatan', '02176325878', 'mpmdistributor@official.com', NULL),
(100024, 'Pt.Plazamedis', 'Jakarta', '021737388995', 'Plazamedis@official.com', NULL),
(100031, 'Agen Vitamale', 'Surabaya', '02187373467', 'Vitamale@official.com', NULL),
(100049, 'PT. Maxima', 'Jakarta Timur', '021717848798', 'Maxima@official.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Kode_Transaksi` int(11) NOT NULL,
  `Kode_Obat` int(11) NOT NULL,
  `Kode_Supplier` int(11) DEFAULT NULL,
  `Kode_Pembeli` int(11) DEFAULT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah_Pembelian` int(11) DEFAULT NULL,
  `Jumlah_Penjualan` int(11) DEFAULT NULL,
  `Subtotal` int(11) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `waktu_Transaksi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Kode_Transaksi`, `Kode_Obat`, `Kode_Supplier`, `Kode_Pembeli`, `Harga`, `Jumlah_Pembelian`, `Jumlah_Penjualan`, `Subtotal`, `Tanggal_Transaksi`, `waktu_Transaksi`) VALUES
(101, 30101, NULL, 1006, 4000, NULL, 2, 8000, '2022-05-17', '12:23:13'),
(102, 601003, NULL, 1007, 50000, NULL, 4, 200000, '2022-05-01', '09:25:54'),
(103, 30101, NULL, 1008, 4000, NULL, 2, 8000, '0000-00-00', '08:25:54'),
(104, 20101, NULL, 1005, 4000, NULL, 3, 12000, '2022-05-04', '09:30:22'),
(105, 101002, NULL, 1001, 5000, NULL, 10, 50000, '2022-05-07', '13:25:56'),
(106, 10101, 100014, NULL, 4000, 100, NULL, 400000, '2022-05-08', '08:38:09'),
(107, 601002, 100017, NULL, 60000, 5, NULL, 300000, '2022-05-04', '09:38:09'),
(108, 10102, 100011, NULL, 3000, 50, NULL, 150000, '2022-05-09', '08:22:16'),
(109, 701004, 100049, NULL, 3000, 50, NULL, 15000, '2022-05-10', '08:19:22'),
(110, 501003, 100031, NULL, 20000, 30, NULL, 600000, '2022-05-11', '09:30:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Kode_Transaksi` (`Kode_Transaksi`),
  ADD KEY `kode_Obat` (`kode_Obat`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`kode_Kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`Kode_Obat`),
  ADD KEY `Kode_Kategori` (`Kode_Kategori`),
  ADD KEY `Kode_Supplier` (`Kode_Supplier`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`Kode_Pembeli`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Kode_Supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Kode_Transaksi`),
  ADD KEY `Kode_Obat` (`Kode_Obat`),
  ADD KEY `Kode_Supplier` (`Kode_Supplier`),
  ADD KEY `Kode_Pembeli` (`Kode_Pembeli`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kode_Obat`) REFERENCES `obat` (`Kode_Obat`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`Kode_Transaksi`) REFERENCES `transaksi` (`Kode_Transaksi`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`Kode_Kategori`) REFERENCES `kategori_obat` (`kode_Kategori`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`Kode_Supplier`) REFERENCES `obat` (`Kode_Supplier`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Kode_Pembeli`) REFERENCES `pembeli` (`Kode_Pembeli`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Kode_Obat`) REFERENCES `obat` (`Kode_Obat`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`Kode_Supplier`) REFERENCES `supplier` (`Kode_Supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;