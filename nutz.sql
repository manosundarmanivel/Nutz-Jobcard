-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 08:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutz`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `priority` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `customer_id`, `appointment_date`, `priority`, `type`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-08-12', 'high', 'new', 1, 1, '2023-08-12 19:59:32', '2023-08-12 19:59:32'),
(2, 2, '2023-08-13', 'medium', 're-visit', 1, 1, '2023-08-12 20:00:04', '2023-08-12 20:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `items` text NOT NULL,
  `created_by` int(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `items`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'test', '[\"test01\",\"test02\",\"test03\\r\\n\"]', 1, 1, '2023-08-12 18:29:48', '2023-08-12 18:29:48'),
(4, 'test1', '[\"test01\",\"test02\",\"test03\"]', 1, 0, '2023-08-12 18:51:37', '2023-08-12 18:51:44'),
(5, 'stone', '[\"stone 1\",\"stone 2\",\"stone 3\"]', 1, 1, '2023-08-16 19:39:20', '2023-08-16 19:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(250) NOT NULL,
  `birth_time` time NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `jataka` text NOT NULL,
  `appointment_date` datetime NOT NULL,
  `created_by` int(100) NOT NULL,
  `updated_by` int(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `mobile_no`, `dob`, `address`, `birth_time`, `place_of_birth`, `jataka`, `appointment_date`, `created_by`, `updated_by`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Test', '02', '9876543210', '2023-08-11 18:30:00', 'Zdfv', '16:40:00', 'Erode', 'aaf0c610ab9499d1918d27a16c901d481.jpeg', '2023-08-12 00:00:00', 1, NULL, 1, '2023-08-12 11:07:17', '2023-08-12 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `remedy`
--

CREATE TABLE `remedy` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `remedy` text NOT NULL,
  `remedy_1_date` date NOT NULL DEFAULT current_timestamp(),
  `remedy_2_date` date NOT NULL DEFAULT current_timestamp(),
  `remedy_3_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(250) NOT NULL,
  `created_by` int(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remedy`
--

INSERT INTO `remedy` (`id`, `customer_id`, `remedy`, `remedy_1_date`, `remedy_2_date`, `remedy_3_date`, `customer_name`, `created_by`, `is_active`, `created_at`, `updated_at`) VALUES
(12, 2, '{\"3\":[\"test01\",\"test02\",\"test03\\r\\n\"],\"5\":[\"stone 1\",\"stone 2\",\"stone 3\"]}', '2023-08-19', '2023-09-20', '2023-10-21', ' Test 02', 1, 1, '2023-08-20 16:35:02', '2023-08-20 17:48:39'),
(13, 2, '{\"3\":[\"test02\"],\"5\":[\"stone 2\",\"stone 3\"]}', '2023-08-20', '2023-09-20', '2023-10-21', ' Test 02', 1, 1, '2023-08-20 17:14:34', '2023-08-20 17:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `deleted_by` int(10) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `created_by`, `deleted_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, 'test@gmail.com', 'NutzDxyxwKMaY2.', 1, 0, NULL, 1, '2023-07-04 01:19:36', '2023-08-12 12:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `remedy`
--
ALTER TABLE `remedy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `remedy`
--
ALTER TABLE `remedy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
