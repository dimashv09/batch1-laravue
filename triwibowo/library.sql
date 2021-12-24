-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 10:11 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Dadang Racing', 'dadangracing@example.com', '082154001137', '6793 Maximo Highway Apt. 186', '2021-12-02 00:43:17', '2021-12-14 22:49:25'),
(2, 'Kendall Wisoky', 'daphney82@example.com', '082103744267', '2112 Haven Field Apt. 043', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(3, 'Marcos Reynolds II', 'lyundt@example.net', '082172067474', '517 Eunice Pike', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(4, 'Garret Greenfelder', 'hernser@example.com', '082822945410', '35080 Dooley Bridge Suite 656', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(5, 'Destini Zulauf PhD', 'lauretta47@example.com', '082891960250', '58156 Lakin Pass', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(6, 'Marielle Stamm', 'stoy@example.org', '082658824921', '7133 Litzy Club', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(7, 'Edmund Schmeler Sr.', 'gene74@example.com', '082295806492', '989 Estella Courts', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(8, 'Lexie Stark IV', 'gutmann.ignatius@example.org', '082288360433', '8132 Brakus Ramp', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(9, 'Mrs. Florence Rippin', 'eda99@example.com', '082366676025', '44229 Schaden Hollow', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(10, 'Raymundo Dooley', 'fernando.weber@example.org', '08224632353', '50360 Walsh Plains Suite 540', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(11, 'Cornell Boyer', 'simone.reilly@example.com', '082788267014', '85988 Carter Flat', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(12, 'Elizabeth Parker PhD', 'lilla48@example.com', '082900233207', '8592 Donavon Key', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(13, 'Jamir Satterfield Sr.', 'kprosacco@example.org', '082644926956', '4921 Emard Grove', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(14, 'Natasha Oberbrunner', 'vgerhold@example.com', '082182227354', '5867 Hauck Union', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(15, 'Mr. Keegan Murray MD', 'ward.preston@example.org', '082188371598', '87040 Carol Lake', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(16, 'Dr. Emmanuel Zieme PhD', 'torey46@example.com', '082944898998', '2018 Reba Mountain Apt. 330', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(17, 'Jarrett Schaden', 'nohara@example.org', '082589036968', '294 Oswaldo Spurs Suite 731', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(18, 'Dustin Hirthe', 'katelynn60@example.org', '08224110002', '5894 Gottlieb Radial', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(19, 'Zion Kerluke DDS', 'pdibbert@example.net', '082644639855', '4303 Miller Track', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(20, 'Domenic Skiles', 'frami.jailyn@example.com', '08241449394', '8950 Jess Locks Apt. 804', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(25, 'Ratih nur handayani', 'ratihnurhandayaniwibowo@gmail.com', '018854545421', 'kiaracondong Bandung Kidul', '2021-12-16 22:46:33', '2021-12-16 23:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(2, 475046244, 'Voluptatem bagong', 2017, 1, 1, 2, 13, 40871, '2021-12-02 00:43:17', '2021-12-23 01:14:10'),
(3, 982171004, 'Molestiae architecto.', 2017, 4, 6, 1, 20, 24660, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(4, 673357861, 'Illum ea veniam.', 2014, 5, 19, 1, 11, 43030, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(5, 950560193, 'Consequatur accusamus velit.', 2015, 4, 20, 3, 19, 16419, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(6, 145061621, 'Facilis unde.', 2006, 2, 14, 2, 10, 20085, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(7, 326401263, 'Sint nesciunt alias.', 2012, 1, 1, 3, 16, 44555, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(8, 181650769, 'Qui error eos.', 2000, 4, 15, 1, 12, 35184, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(9, 164342696, 'Illum nostrum.', 2003, 5, 5, 3, 13, 13158, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(10, 216515932, 'Fugiat adipisci.', 2018, 3, 20, 4, 16, 24698, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(11, 866836212, 'Non quasi dolorem.', 2004, 3, 4, 1, 11, 30178, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(12, 430572715, 'Rem rerum reprehenderit.', 2006, 1, 12, 1, 17, 47987, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(13, 703723955, 'Nihil blanditiis in.', 2008, 2, 6, 4, 18, 15964, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(14, 572662430, 'Eligendi sit.', 2014, 1, 3, 3, 20, 38738, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(15, 237709850, 'Culpa veritatis.', 2004, 2, 16, 2, 18, 42132, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(16, 9442196, 'Harum quia et.', 2013, 2, 6, 4, 11, 11605, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(17, 763470665, 'Rerum quaerat.', 2000, 3, 14, 4, 14, 28940, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(19, 729405751, 'Necessitatibus ad.', 2013, 4, 8, 2, 18, 13684, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(20, 941279042, 'Omnis et.', 2004, 5, 4, 2, 20, 40864, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(21, 325142030, 'Nostrum quasi sunt.', 2014, 4, 19, 2, 18, 27608, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(22, 196704420, 'Totam id.', 2021, 2, 1, 3, 15, 45449, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(23, 57046965, 'Dolorem quis maiores.', 2012, 5, 5, 4, 12, 25229, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(24, 713974886, 'Aut tenetur perspiciatis.', 2010, 5, 2, 4, 12, 40054, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(25, 895671995, 'Id eveniet sit.', 2017, 2, 20, 3, 10, 17725, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(26, 511246246, 'Nisi fuga cumque.', 2002, 3, 1, 2, 15, 24837, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(27, 877962138, 'Consectetur numquam rem.', 2005, 3, 12, 4, 10, 18715, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(28, 88323583, 'Enim ut ut.', 2012, 4, 10, 3, 19, 31008, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(29, 406905350, 'Atque autem.', 2012, 5, 2, 3, 15, 35956, '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(30, 767588837, 'Ea et.', 2011, 1, 1, 2, 11, 16498, '2021-12-02 00:43:17', '2021-12-02 00:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nature', '2021-12-02 00:43:17', '2021-12-21 21:28:46'),
(2, 'Anime', '2021-12-02 00:43:17', '2021-12-21 21:28:56'),
(3, 'Locomotive Engineer', '2021-12-02 00:43:17', '2021-12-21 21:29:10'),
(4, 'Personal Trainer', '2021-12-02 00:43:17', '2021-12-21 21:29:19'),
(5, 'Programming', '2021-12-12 20:55:51', '2021-12-12 20:55:51'),
(6, 'Action', '2021-12-12 20:56:41', '2021-12-21 21:29:33'),
(12, 'Hentai', '2021-12-15 03:43:21', '2021-12-21 21:29:42'),
(13, 'Magic', '2021-12-15 03:55:44', '2021-12-21 21:29:52'),
(14, 'Books', '2021-12-21 21:28:26', '2021-12-21 21:29:59'),
(15, 'Nani', '2021-12-22 20:36:55', '2021-12-22 20:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Tri Joko Santoso Wibowo', 'P', '082697693727', '83347 Noel Via', 'triewidie2@gmail.com', '2021-12-02 00:43:17', '2021-12-20 00:05:19'),
(2, 'Ms. Winnifred Thiel MD', 'L', '08272450424', '603 Abbie Alley', 'myra87@example.org', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(3, 'Miss Emie Mraz', 'P', '08242161222', '4064 McGlynn Ford', 'braxton.lemke@example.net', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(4, 'Mr. Vaughn Willms', 'P', '082783470568', '8069 Lyric Locks Apt. 357', 'melany.gorczany@example.com', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(5, 'Prof. Caleigh Hyatt MD', 'L', '082180756377', '7622 Waelchi Estate Apt. 141', 'hessel.garth@example.org', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(6, 'Dr. Juliet Greenholt', 'L', '082811004343', '14630 Lavonne Shore Suite 286', 'molly23@example.org', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(7, 'Sheridan Dickinson', 'P', '082474357755', '5277 Ciara Unions Suite 864', 'susanna56@example.net', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(8, 'Ethel Funk', 'L', '082977712913', '7563 Berenice Mall Apt. 134', 'lelia.harris@example.org', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(9, 'Dr. Kamryn Quigley', 'L', '082998270155', '14174 Demetrius Islands Suite 054', 'kschneider@example.com', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(10, 'Maurine Bauch', 'L', '082846898168', '4394 Alexys Highway Suite 228', 'pcarter@example.net', '2021-12-02 00:43:17', '2021-12-02 00:43:17');

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
(1, '2010_12_01_040543_create_members_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_01_040706_create_publishers_table', 1),
(7, '2021_12_01_040732_create_authors_table', 1),
(8, '2021_12_01_040816_create_catalogs_table', 1),
(9, '2021_12_01_040831_create_books_table', 1),
(10, '2021_12_01_040849_create_transactions_table', 1),
(11, '2021_12_01_040924_create_transaction_details_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Jacynthe Weissnat', 'name.stoltenberg@example.net', '082136023195', '129 Sauer Field Apt. 124', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(2, 'Ryleigh Nolan', 'lon03@example.com', '082428296132', '8407 Tomas Green', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(3, 'Ora Auer', 'kathryn40@example.com', '082429039027', '5800 Murphy Tunnel Apt. 998', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(4, 'Earl Oberbrunner', 'lweissnat@example.com', '082112311117', '699 Lavern Mill Suite 039', '2021-12-02 00:43:17', '2021-12-02 00:43:17'),
(5, 'Coty Bernhard I', 'ludie12@example.net', '082530046005', '2359 Bergstrom Villages', '2021-12-02 00:43:17', '2021-12-02 00:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'Tri Joko Santoso Wibowo', 'triewidie2@gmail.com', NULL, '$2y$10$WHuJQG59Q3boFqm7xNQzIuUQ4pUf8iviw1J2vlbFUMnIS6ZhKQqLS', NULL, 1, '2021-12-02 22:29:47', '2021-12-02 22:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
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
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
