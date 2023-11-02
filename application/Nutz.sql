-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2023 at 07:47 AM
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
(1, 'MANO SUNDAR M ', 'Technician', '7983484', ' kkkk', 'manosundarmm', '839048239047', 0, 0, NULL, NULL, '2023-11-01 18:01:49', '2023-11-01 18:01:49');

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
(1, 'Mano Sundar', '7435987589', 2, 'bferfbufg3wefgewufg', 'mano@gmail.com', '6358327648237', '73298467432', 'type2', '4792', '100%', 0, 1, NULL, NULL, '2023-10-29 21:25:17', '2023-10-29 21:25:17');

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
(2, 'Customer', 'Customer', 1, 0, 1, NULL, '2023-10-29 12:58:43', '2023-10-30 22:18:27'),
(3, 'Dinesh', 'Type 3', 0, 1, 1, NULL, '2023-10-29 21:28:44', '2023-10-29 21:28:44'),
(4, 'Kumar', 'Supplier', 0, 0, 1, NULL, '2023-10-29 21:35:00', '2023-10-29 21:35:13'),
(5, 'Group 2', 'Supplier', 0, 1, 1, NULL, '2023-10-31 19:33:00', '2023-10-31 19:33:00');

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
(3, 'Brand 4', 1, 0, NULL, NULL, '2023-10-30 22:07:20', '2023-10-30 22:07:20');

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
(6, 'Machines', 0, 0, NULL, NULL, '2023-10-29 22:57:03', '2023-10-29 22:57:03'),
(7, 'Machines', 0, 0, NULL, NULL, '2023-10-29 23:16:20', '2023-10-29 23:16:20'),
(8, 'Machines', 1, 0, NULL, NULL, '2023-10-29 23:17:47', '2023-10-29 23:17:47'),
(9, 'Spares', 1, 0, NULL, NULL, '2023-10-30 00:06:11', '2023-10-30 00:06:11'),
(10, 'Machines', 1, 0, NULL, NULL, '2023-10-31 19:27:28', '2023-10-31 19:27:28');

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
(2, 8, 'test', 0, 0, NULL, NULL, '2023-10-30 00:23:55', '2023-10-30 00:23:55'),
(3, NULL, 'Test 3', 0, 0, NULL, NULL, '2023-10-30 00:28:49', '2023-10-30 00:28:49'),
(4, 8, 'Test 3', 1, 0, NULL, NULL, '2023-10-30 16:15:10', '2023-10-30 16:15:10');

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
(3, '3224', 'fewf', 'refefrf', 'erfverfve', 'ervvevcre', 'erfverfvc', 8, 4, 4, 3, 342, '3424', 3242, 3243, 342, '32424', 3242, 32434, 0, 1, NULL, NULL, '2023-10-31 19:26:29', '2023-10-31 19:26:29');

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
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ledger_group`
--
ALTER TABLE `ledger_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `outwork_vendor`
--
ALTER TABLE `outwork_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_group`
--
ALTER TABLE `product_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
