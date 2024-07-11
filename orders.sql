-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrjweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `supervisor_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_at` datetime DEFAULT NULL,
  `approved_by` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `supervisor_id`, `section_id`, `items`, `status`, `created_at`, `approved_at`, `approved_by`) VALUES
(10, 39, 1, 3, '{\"4\":{\"id\":4,\"name\":\"BROOM HEAD (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":1}}', 'pending', '2024-07-10 11:11:01', NULL, NULL),
(11, 39, 1, 9, '{\"4\":{\"id\":4,\"name\":\"BROOM HEAD (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":7}}', 'pending', '2024-07-11 10:21:58', NULL, NULL),
(12, 39, 1, 4, '{\"6\":{\"id\":6,\"name\":\"DECK BRUSH 10\\\" (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":3},\"5\":{\"id\":5,\"name\":\"CENTER PULL TOWELS (ro)\",\"item_type\":1,\"image\":\"\",\"quantity\":3},\"4\":{\"id\":4,\"name\":\"BROOM HEAD (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":3}}', 'pending', '2024-07-11 10:22:48', NULL, NULL),
(13, 38, 38, 19, '{\"5\":{\"id\":5,\"name\":\"CENTER PULL TOWELS (ro)\",\"item_type\":1,\"image\":\"\",\"quantity\":22}}', 'pending', '2024-07-11 11:21:38', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
