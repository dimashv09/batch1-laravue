-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 08:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `name`, `sex`, `telp`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'P', '087821505412', 'Bandung', 'admin@gmail.com', NULL, NULL),
(3, 'Pelita', 'P', '087821505412', 'Gunung Batu, Bandung', 'pelita@gmail.com', '2021-05-27 20:39:20', NULL),
(4, 'Ayu', 'P', '08112121222', 'Sukawarna, Bandung', 'ayu@gmail.com', '2021-05-27 20:39:46', NULL),
(5, 'Fadhli', 'L', '08133613111', 'Cilandak, Jakarta', 'fadhli@gmail.com', '2021-05-27 20:40:13', NULL),
(6, 'Nur', 'P', '08212221311', 'Sunter, Jakarta', 'nur@gmail.com', '2021-05-27 20:40:49', NULL),
(7, 'Bagus', 'L', '0827379111', 'Sarijadi, Bandung', 'bagus@gmail.com\r\n', '2021-05-27 20:46:35', NULL),
(8, 'Mahendra', 'P', '08772191811', 'Sariwangi, Bandung', 'mahendra@gmail.com', '2021-05-27 20:46:35', NULL),
(9, 'Najmin', 'P', '08712911991', 'Sukaraja, Bandung', 'najmina@gmail.com', '2021-05-27 20:47:01', NULL),
(10, 'Putri', 'P', '0827191811', 'Cimahi', 'putri@gmail.com', '2021-06-02 10:00:42', NULL),
(11, 'Ridwan', 'L', '0898188191', 'Baros, Cimahi', 'ridwan@gmail.com', '2021-06-02 10:01:58', NULL),
(12, 'Feby', 'P', '08991717711', 'Sukajadi, Bandung', 'feby@gmail.com\r\n', '2021-06-02 10:01:58', NULL),
(13, 'Cindy', 'P', '08272772791', 'Sentral, Cimahi', 'cindy@gmail.com', '2021-06-02 10:03:16', NULL),
(14, 'Farid', 'P', '0876637911', 'Buah Batu, Bandung', 'farid@gmail.com', '2021-06-02 10:03:16', NULL),
(15, 'Bayu', 'L', '0887639199', 'Sunter, Jakarta', 'bayu@gmail.com', '2021-06-02 10:04:09', NULL),
(16, 'Deni', 'L', '0876619111', 'Cikutra, Subang', 'deni@gmail.com', '2021-06-02 11:30:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `judul` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `id_katalog` bigint(20) UNSIGNED NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`, `created_at`, `updated_at`) VALUES
(18, 882291, 'Buku Belajar Laravel', 2020, 2, 5, 5, 3, 2000, NULL, '2021-08-05 04:04:37'),
(19, 391881, 'Buku CSS', 2018, 3, 3, 3, 10, 5000, NULL, '2021-08-05 04:04:37'),
(20, 999281, 'Belajar Baca', 2021, 6, 6, 3, 8, 10000, NULL, NULL),
(21, 999281, 'PHP Lanjut', 2021, 6, 6, 3, 8, 15000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `id_peminjaman`, `id_buku`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 1, NULL, NULL),
(2, 1, 19, 1, NULL, NULL),
(3, 2, 21, 1, NULL, NULL),
(4, 2, 19, 1, NULL, NULL),
(5, 3, 20, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalogs`
--

CREATE TABLE `katalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalogs`
--

INSERT INTO `katalogs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Buku Anak', NULL, NULL),
(3, 'Buku Belajar', NULL, NULL),
(4, 'Buku Belajar Agama', NULL, NULL),
(5, 'Buku Kesehatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_06_17_181154_create_anggotas_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_06_17_180957_create_penerbits_table', 1),
(6, '2021_06_17_181020_create_pengarangs_table', 1),
(7, '2021_06_17_181058_create_katalogs_table', 1),
(8, '2021_06_17_181108_create_bukus_table', 1),
(9, '2021_06_17_181140_create_peminjaman_table', 1),
(10, '2021_06_17_181141_create_detail_peminjaman_table', 1),
(11, '2021_07_19_195916_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `created_at`, `updated_at`, `status`) VALUES
(1, 15, '2021-05-01', '2021-05-06', NULL, NULL, 0),
(2, 15, '2021-06-01', '2021-06-02', NULL, NULL, 0),
(3, 10, '2021-06-10', '2021-06-12', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama_penerbit`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya', NULL, NULL),
(2, 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung', NULL, NULL),
(3, 'Penerbit 03', 'penerbit3@gmail.com', '', 'Jakarta Barat', NULL, NULL),
(4, 'Penerbit 04', 'penerbit4@gmail.com', '08972017209', 'Jakarta Selatan', NULL, NULL),
(5, 'Penerbit 05', 'penerbit5@gmail.com', '08972187209', 'Jakarta Selatan', NULL, NULL),
(6, 'Penerbit 06', 'penerbit6@gmail.com', '08112187209', 'Jakarta Barat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengarangs`
--

CREATE TABLE `pengarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengarang` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengarangs`
--

INSERT INTO `pengarangs` (`id`, `nama_pengarang`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Pengarang 01', 'pengarang1@perpus.co.id', '0929211', 'Bandung', NULL, NULL),
(2, 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta', NULL, NULL),
(3, 'Pengarang 03', 'pengarang3@perpus.co.id', '092921199', 'Banten', NULL, NULL),
(4, 'Pengarang 04', 'pengarang4@perpus.co.id', '93938199', 'Jakarta', NULL, NULL),
(5, 'Pengarang 05', 'pengarang5@perpus.co.id', '93938199', 'Cimahi', NULL, NULL),
(6, 'Pengarang 06', 'pengarang6@perpus.co.id', '0818176111', 'Cimahi', NULL, NULL),
(7, 'Pengarang 07', 'pengarang7@perpus.co.id', '08181762291', 'Semarang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `id_anggota`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pelita Nur Najmina', 'pelitanurnajmina27@gmail.com', NULL, '$2y$10$MM6RWcj2nh/JfQkeHzqqe.wf8wo7OX1D7.svzDIEPYQXHUDvrboOi', 1, NULL, '2021-06-18 00:35:14', '2021-06-18 00:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_id_penerbit_foreign` (`id_penerbit`),
  ADD KEY `bukus_id_pengarang_foreign` (`id_pengarang`),
  ADD KEY `bukus_id_katalog_foreign` (`id_katalog`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjaman_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_peminjaman_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalogs`
--
ALTER TABLE `katalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id_anggota_foreign` (`id_anggota`);

--
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengarangs`
--
ALTER TABLE `pengarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_anggota_foreign` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalogs`
--
ALTER TABLE `katalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengarangs`
--
ALTER TABLE `pengarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_id_katalog_foreign` FOREIGN KEY (`id_katalog`) REFERENCES `katalogs` (`id`),
  ADD CONSTRAINT `bukus_id_penerbit_foreign` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbits` (`id`),
  ADD CONSTRAINT `bukus_id_pengarang_foreign` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarangs` (`id`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`),
  ADD CONSTRAINT `detail_peminjaman_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
