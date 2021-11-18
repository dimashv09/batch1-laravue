-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 09:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `product_id`, `payment_id`, `price`) VALUES
(1, 1, 1, 25000),
(2, 12, 8, 7500000),
(3, 15, 3, 250000),
(4, 11, 10, 149000),
(5, 3, 7, 15000),
(6, 2, 4, 75000),
(7, 14, 9, 750000),
(8, 16, 6, 50000),
(9, 13, 8, 500000),
(10, 1, 5, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(2, 'Obat', 'Khusus pasien ...'),
(3, 'Peralatan anak', 'Khusus bayi ...'),
(4, 'Peralatan suami istri', 'Khusus pasutri ...'),
(5, 'Peralatan ibu-ibu', 'Khusus bumil/busui ...'),
(6, 'Cosmetik', 'Khusus kecantikan ...'),
(7, 'Alat mandi', 'Khusus kebersihan badan ...'),
(8, 'Fitness & GYM', 'Khusus olahraga ...'),
(9, 'Alat cacat', 'Khusus Pasien cacat ...'),
(10, 'Vitamin', 'Khusus penambah gizi ...'),
(11, 'Alat medis', 'Khusus Bidan dan perawat ...');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`) VALUES
(1, 'Muhamad', '081234567890'),
(2, 'Ahmad', '08123456789'),
(3, 'Suhail', '08123456789'),
(4, 'Abdullah', '08123456789'),
(5, 'Abdurrahman', '08123456789'),
(6, 'Saeed', '08123456789'),
(7, 'Othman', '08123456789'),
(8, 'Alawi', '08123456789'),
(9, 'Emad', '08123456789'),
(10, 'Emran', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `instagram` varchar(32) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `email`, `instagram`, `customer_id`) VALUES
(1, 'muhamadhaspin@gmail.com', '@mhmmdhdyh', 1),
(2, 'abdullah@gmail.com', '@abdullah', 4),
(3, 'abdurrahman@gmail.com', '@abdurrahman', 5),
(4, 'ahmad@gmail.com', '@ahmad', 2),
(5, 'alawi@gmail.com', '@alawi', 8),
(6, 'emad@gmail.com', '@emad', 9),
(7, 'emran@gmail.com', '@emran', 10),
(8, 'othman@gmail.com', '@othman', 7),
(9, 'saeed@gmail.com', '@saeed', 6),
(10, 'suhail@gmail.com', '@suhail', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `pay_date`, `total_price`, `customer_id`) VALUES
(1, '2021-11-17 02:56:47', 100000, 1),
(2, '2021-11-18 08:16:11', 99000, 10),
(3, '2021-11-18 08:16:11', 79999, 4),
(4, '2021-11-18 08:16:11', 67550, 7),
(5, '2021-11-18 08:16:11', 150000, 2),
(6, '2021-11-18 08:16:11', 300000, 7),
(7, '2021-11-18 08:16:11', 5000000, 2),
(8, '2021-11-18 08:16:11', 3500000, 5),
(9, '2021-11-18 08:16:11', 2500000, 4),
(10, '2021-11-18 08:16:11', 567000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` varchar(32) NOT NULL,
  `category_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `category_id`) VALUES
(1, 'Panadol', '20000', 2),
(2, 'Botol susu', '35000', 3),
(3, 'Paracetamol', '15000', 2),
(4, 'Kontrasepsi', '35000', 4),
(5, 'Susu prenagen', '50000', 5),
(11, 'Pampers', '150000', 3),
(12, 'WHEY Protein', '350000', 8),
(13, 'Sahmpoo', '25000', 7),
(14, 'Kursi Roda', '700000', 9),
(15, 'Vitamin B12', '150000', 10),
(16, 'Sabun cuci muka', '40000', 6),
(17, 'Guning bedah', '75000', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill` (`payment_id`),
  ADD KEY `fk_billproduct` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customers` (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `fk_billproduct` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD CONSTRAINT `fk_customers` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
