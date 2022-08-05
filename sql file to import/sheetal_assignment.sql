-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 04:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheetal_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `f_name`, `l_name`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(4, '', '', 'superadmin', '$2y$10$eo7.w0Ttuy8mOBMvDlGqDeewQERkXu//7qO3jXp5NC76LwfAZpNrO', 'rvuWJHMd5LTxLC2J', '$2y$10$LDUi4w/UAM2PgfMoKkLo4.igJX39G5/WQOEDHRaDy3y2KZeIxXggm', '2019-02-16 22:39:57', 'super'),
(8, 'Sheetal', 'Dhumal', 'admin', '$2y$10$RnDwpen5c8.gtZLaxHEHDOKWY77t/20A4RRkWBsjlPuu7Wmy0HyBu', 'MyG5Xw2I12EWdJeD', '$2y$10$XL/RhpCz.uQoWE1xV77Wje4I4ker.gtg7YV4yqNwLZfzIYnP7E8Na', '2019-08-22 01:12:33', 'admin'),
(47, 'Geeta', 'Mane', 'geeta', '$2y$10$CiR4Oii84xdIHmuX4Kya5emmo1ydgufFL/QtQWnWAS84.1Anob3uu', NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `subproduct_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `subproduct_id`, `amount`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(34, '5', 9, 2000, 2, 4000, '2022-08-05 02:37:37', '2022-08-04 23:07:37'),
(35, '7,5', 14, 25000, 10, 250000, '2022-08-05 02:36:41', '2022-08-04 23:06:41'),
(36, '6,5', 10, 30000, 2, 60000, '2022-08-05 02:38:13', '2022-08-04 23:08:13'),
(37, '7,5', 14, 35000, 2, 70000, '2022-08-04 23:08:44', '0000-00-00 00:00:00'),
(38, '9', 15, 20000, 2, 40000, '2022-08-05 02:44:10', '2022-08-04 23:14:10'),
(39, '10', 16, 45000, 2, 90000, '2022-08-05 02:49:42', '2022-08-04 23:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `product_description`, `created_at`, `updated_at`) VALUES
(5, 'Dell', 'Laptop', 'Dell inspiron description', '2022-08-04 12:16:52', '2022-08-04 08:46:52'),
(6, 'Samsung', 'Mobile', 'Samsung grand description', '2022-08-04 12:16:43', '2022-08-04 08:46:43'),
(7, 'Sony Series', 'Mobile', 'Sony prod description aa', '2022-08-04 12:51:03', '2022-08-04 09:21:03'),
(9, 'Redmi series', 'Mobile', 'Redmi series desc', '2022-08-05 02:42:44', '2022-08-04 23:12:44'),
(10, 'Jio series', 'Mobile', 'Jio series desc', '2022-08-05 02:48:04', '2022-08-04 23:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `subproducts`
--

CREATE TABLE `subproducts` (
  `id` int(11) NOT NULL,
  `subproduct_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `subproduct_category` varchar(255) NOT NULL,
  `subproduct_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subproducts`
--

INSERT INTO `subproducts` (`id`, `subproduct_name`, `product_id`, `subproduct_category`, `subproduct_description`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Grand2', 6, 'Mobile', 'samsung grand2 description', '2022-08-04 12:20:11', '2022-08-04 08:50:11'),
(3, 'Dell inspiron 3520', 5, 'Laptop', 'Dell inspiron 3520 description', '2022-08-04 08:51:00', '0000-00-00 00:00:00'),
(4, 'Dell inspiron 5518', 5, 'Laptop', 'Dell inspiron 5518 description', '2022-08-04 08:52:50', '0000-00-00 00:00:00'),
(8, 'Sonysub', 7, 'Mobile', 'test updt', '2022-08-04 15:55:43', '2022-08-04 12:25:43'),
(9, 'Dell sub2', 5, 'Laptop', 'test', '2022-08-04 13:27:48', '0000-00-00 00:00:00'),
(10, 'Samsung subprod1', 6, 'Mobile', 'test des', '2022-08-04 13:30:13', '0000-00-00 00:00:00'),
(11, 'Dell sub3', 5, 'Laptop', 'test', '2022-08-04 17:11:41', '2022-08-04 13:41:41'),
(14, 'Sony Ericsson 2211', 7, 'Mobile', 'sony ericsson description', '2022-08-04 23:01:14', '0000-00-00 00:00:00'),
(15, 'Redmi 9A', 9, 'Mobile', 'Redmi 9A des', '2022-08-05 02:43:35', '2022-08-04 23:13:35'),
(16, 'Jio phone next', 10, 'Mobile', 'Jio phone next des', '2022-08-05 02:49:01', '2022-08-04 23:19:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subproducts`
--
ALTER TABLE `subproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subproducts`
--
ALTER TABLE `subproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
