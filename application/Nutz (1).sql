-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2023 at 08:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nutz`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `contact`, `address`, `username`, `password`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'MANO SUNDAR M ', 'Technician', '7983484', ' kkkk', 'manosundarmm', '839048239047', 1, 0, NULL, NULL, '2023-11-01 18:01:49', '2023-11-01 18:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `jobID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `jobcardNo` varchar(255) NOT NULL,
  `products` varchar(255) DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `assigned` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `jobID`, `productID`, `jobcardNo`, `products`, `problem`, `service`, `assigned`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2', '3', 'nothing', '2', '1', '2023-11-05 04:36:27', '2023-11-05 04:36:27'),
(2, 4, 2, '2', '3', 'nothing', '2', '1', '2023-11-05 04:43:28', '2023-11-05 04:43:28'),
(3, 5, 3, '', '', '', '', '', '2023-11-05 06:19:21', '2023-11-05 06:19:21'),
(4, 6, 4, '', '', '', '', '', '2023-11-05 06:20:08', '2023-11-05 06:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `formno` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `customerName` varchar(255) DEFAULT NULL,
  `warrantyStatus` tinyint(1) NOT NULL,
  `billNo` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `createdBy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jobcard_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `formno`, `contact`, `customerName`, `warrantyStatus`, `billNo`, `remarks`, `createdBy`, `created_at`, `updated_at`, `jobcard_status`) VALUES
(3, '123', '9442911327', 'Mano Sundar', 1, '321', ' nil', 'Mano Sundar', '2023-11-05 04:36:27', '2023-11-05 04:36:27', NULL),
(4, '123', '9442911327', 'Mano Sundar', 1, '321', ' nil', 'Mano Sundar', '2023-11-05 04:43:28', '2023-11-05 04:43:28', NULL),
(5, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:19:21', '2023-11-05 06:19:21', 1),
(6, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:20:08', '2023-11-05 06:20:08', 1),
(7, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:21:58', '2023-11-05 06:21:58', 1),
(8, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:23:36', '2023-11-05 06:23:36', 1),
(9, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:24:32', '2023-11-05 06:24:32', 1),
(10, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:28:21', '2023-11-05 06:28:21', 1),
(11, '', '', '', 0, '', ' ', 'Mano Sundar', '2023-11-05 06:29:36', '2023-11-05 06:29:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `ledger_group_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `gst_no` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `entry_type` varchar(50) DEFAULT NULL,
  `price_list` varchar(50) DEFAULT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `is_outworker` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `name`, `contact_no`, `ledger_group_id`, `address`, `email_id`, `gst_no`, `pan_no`, `entry_type`, `price_list`, `discount`, `is_outworker`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Mano Sundar', '9442911327', 2, 'bferfbufg3wefgewufg', 'mano@gmail.com', '6358327648237', '73298467432', 'type2', '4792', '100%', 0, 1, NULL, NULL, '2023-10-29 21:25:17', '2023-11-04 22:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_group`
--

CREATE TABLE `ledger_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger_group`
--

INSERT INTO `ledger_group` (`id`, `name`, `type`, `is_default`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Supplier', 'Supplier', 1, 1, 1, NULL, '2023-10-29 12:58:43', '2023-10-29 17:30:09'),
(2, 'Customer', 'Customer', 1, 1, 1, NULL, '2023-10-29 12:58:43', '2023-11-03 22:32:55'),
(6, 'Mano', 'Delivery man', 0, 1, 1, NULL, '2023-11-03 22:35:58', '2023-11-03 22:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `outwork_vendor`
--

CREATE TABLE `outwork_vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outwork_vendor`
--

INSERT INTO `outwork_vendor` (`id`, `name`, `contact`, `address`, `email`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Vendor 1', '3749847', ' fliewjfeowijfow', 'manosundarm@gmail.com', 0, 0, NULL, NULL, '2023-11-01 19:36:08', '2023-11-01 19:36:08'),
(2, 'Vendor 2', '7983484', ' ', 'manosundar4834@gmail.com', 1, 0, NULL, NULL, '2023-11-01 19:46:39', '2023-11-01 19:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `jobID` int(11) DEFAULT NULL,
  `jobcardNo` varchar(255) NOT NULL,
  `products` varchar(255) DEFAULT NULL,
  `complaint` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `assigned` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `jobID`, `jobcardNo`, `products`, `complaint`, `service`, `assigned`, `created_at`, `updated_at`) VALUES
(1, 3, '1', '4', '3', '2', '1', '2023-11-05 04:36:27', '2023-11-05 04:36:27'),
(2, 4, '1', '4', '3', '2', '1', '2023-11-05 04:43:28', '2023-11-05 04:43:28'),
(3, 5, '', '', '', '', '', '2023-11-05 06:19:21', '2023-11-05 06:19:21'),
(4, 6, '', '', '', '', '', '2023-11-05 06:20:08', '2023-11-05 06:20:08'),
(5, 8, '', '', '', '', '', '2023-11-05 06:23:36', '2023-11-05 06:23:36'),
(6, 9, '', '', '', '', '', '2023-11-05 06:24:32', '2023-11-05 06:24:32'),
(7, 10, '123', '', '', '', '', '2023-11-05 06:28:21', '2023-11-05 06:28:21'),
(8, 11, '12', '', '', '', '', '2023-11-05 06:29:36', '2023-11-05 06:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Brand 1', 0, 0, NULL, NULL, '2023-10-30 21:59:49', '2023-10-30 21:59:49'),
(3, 'Brand 4', 1, 0, NULL, NULL, '2023-10-30 22:07:20', '2023-10-30 22:07:20'),
(4, 'Mughil\'s Cow', 0, 0, NULL, NULL, '2023-11-02 19:37:13', '2023-11-02 19:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 'Spares', 1, 1, NULL, NULL, '2023-11-03 22:48:28', '2023-11-03 22:48:28'),
(10, 'Machines', 1, 1, NULL, NULL, '2023-11-03 22:48:31', '2023-11-03 22:48:31'),
(11, 'New product', 1, 0, NULL, NULL, '2023-11-03 22:48:52', '2023-11-03 22:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

CREATE TABLE `product_group` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_group`
--

INSERT INTO `product_group` (`id`, `product_category_id`, `name`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 11, 'test', 0, 0, NULL, NULL, '2023-10-30 00:23:55', '2023-10-30 00:23:55'),
(3, NULL, 'Test 3', 0, 0, NULL, NULL, '2023-10-30 00:28:49', '2023-10-30 00:28:49'),
(4, 11, 'Test 3', 1, 0, NULL, NULL, '2023-10-30 16:15:10', '2023-10-30 16:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `is_active`) VALUES
(4, 3, '777c75b2a331dc9c0d5bf932b7aaf0b1.png', 0),
(5, 3, '2c5cca9ee1e29abeb5e3c1c3051ede68.png', 0),
(6, 3, 'd6cedf2771f71fe43a621603f33df140.jpg', 0),
(7, 3, '3a4976f03b3df479fc35ec299887f103.jpg', 0),
(8, 3, 'db5d7eb81aa3d02c0cf00e86d8dae086.png', 0),
(9, 3, '69fc0ef97962045e9dd4fb388d32d539.jpg', 0),
(10, 3, '183c1c0b62623d7b29e604a1398813ca.jpg', 0),
(11, 3, 'ba19ea69ecde9cfc1bd6fb0924ab12e1.png', 0),
(12, 3, '08035df6dbc7f12181cc6ca596be0443.jpg', 0),
(13, 3, 'e93419a6ca6527069a5815d17e058d4d.jpg', 0),
(14, 3, '07bb3d63b6d4e44a1e66fcf5ac8bdcb1.png', 1),
(15, 3, '326475749dd064ac1e726251a9ad7dcf.png', 1),
(16, 3, 'bdc141212efc46f1a530846afd3b5488.jpg', 1),
(17, 3, '4e8f8ed47ff2ce698b688b4043df6e3e.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_item`
--

CREATE TABLE `product_item` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `selling_unit` varchar(255) DEFAULT NULL,
  `purchase_unit` varchar(255) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_group_id` int(11) DEFAULT NULL,
  `product_model_id` int(11) DEFAULT NULL,
  `product_brand_id` int(11) DEFAULT NULL,
  `tax_master_id` int(11) DEFAULT NULL,
  `hsn_sac_code` varchar(255) DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `dealer_billing_price` float DEFAULT NULL,
  `wholesale_price` float DEFAULT NULL,
  `mpo` varchar(255) DEFAULT NULL,
  `min_stock` int(11) DEFAULT NULL,
  `max_stock` int(11) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_item`
--

INSERT INTO `product_item` (`id`, `code`, `name`, `description`, `image_url`, `selling_unit`, `purchase_unit`, `product_category_id`, `product_group_id`, `product_model_id`, `product_brand_id`, `tax_master_id`, `hsn_sac_code`, `purchase_price`, `dealer_billing_price`, `wholesale_price`, `mpo`, `min_stock`, `max_stock`, `is_default`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, '3224', 'fewf', 'refefrf', 'erfverfve', 'ervvevcre', 'erfverfvc', 9, 4, 4, 3, 342, '3424', 3242, 3243, 342, '32424', 3242, 32434, 0, 1, NULL, NULL, '2023-10-31 19:26:29', '2023-10-31 19:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_model`
--

CREATE TABLE `product_model` (
  `id` int(11) NOT NULL,
  `product_group_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_model`
--

INSERT INTO `product_model` (`id`, `product_group_id`, `name`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Model 4', 0, 0, NULL, NULL, '2023-10-30 19:29:41', '2023-10-30 19:29:41'),
(3, 4, 'Model 1', 1, 0, NULL, NULL, '2023-10-30 19:42:37', '2023-10-30 19:42:37'),
(4, 4, 'Model 2', 1, 0, NULL, NULL, '2023-10-30 19:42:44', '2023-10-30 19:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_model_complaint`
--

CREATE TABLE `product_model_complaint` (
  `id` int(11) NOT NULL,
  `product_model_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_model_complaint`
--

INSERT INTO `product_model_complaint` (`id`, `product_model_id`, `name`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Compaint 5', 0, 0, NULL, NULL, '2023-10-30 21:07:39', '2023-10-30 21:07:39'),
(3, 3, 'Compalint 1', 1, 0, NULL, NULL, '2023-10-31 19:15:19', '2023-10-31 19:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `is_default` tinyint(1) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `name`, `description`, `is_active`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Service Type 1', 'Sample description', 0, 0, NULL, NULL, '2023-11-01 11:25:17', '2023-11-01 11:25:17'),
(2, 'Service Type 1', 'Sample description 1', 1, 0, NULL, NULL, '2023-11-01 11:31:12', '2023-11-01 11:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobID` (`jobID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ledger_group_constrain` (`ledger_group_id`);

--
-- Indexes for table `ledger_group`
--
ALTER TABLE `ledger_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_unique` (`name`);

--
-- Indexes for table `outwork_vendor`
--
ALTER TABLE `outwork_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobID` (`jobID`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_group`
--
ALTER TABLE `product_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_item`
--
ALTER TABLE `product_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_model`
--
ALTER TABLE `product_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_model_complaint`
--
ALTER TABLE `product_model_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledger_group`
--
ALTER TABLE `ledger_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `outwork_vendor`
--
ALTER TABLE `outwork_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_group`
--
ALTER TABLE `product_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_item`
--
ALTER TABLE `product_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_model`
--
ALTER TABLE `product_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_model_complaint`
--
ALTER TABLE `product_model_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `job` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `job` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
