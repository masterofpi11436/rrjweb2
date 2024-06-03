-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 10:20 PM
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
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `name`, `title`, `section`, `extension`) VALUES
(1, 'Mark Tuggle', 'Techician', 'MIU', '6035'),
(2, 'Neil Marlowe', 'MIU Administrator', 'MIU', '6024'),
(6, 'Lisa Marlowe', 'HR Tech', 'HR', '6025');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'tablet'),
(3, 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE `tablet` (
  `id` int(255) NOT NULL,
  `inmate_number` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_found` date DEFAULT NULL,
  `is_reported` tinyint(1) NOT NULL,
  `is_filed` tinyint(1) NOT NULL,
  `is_charged` tinyint(1) NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablet`
--

INSERT INTO `tablet` (`id`, `inmate_number`, `first_name`, `middle_name`, `last_name`, `date_found`, `is_reported`, `is_filed`, `is_charged`, `is_paid`) VALUES
(1, 36096, 'LEONARD', 'BRANDON', 'BOGAN', '2024-05-01', 0, 0, 1, 1),
(3, 81857, 'ALEXANDER', NULL, 'NELSON', NULL, 0, 0, 0, 0),
(16, 85670, 'JAMARCUS', 'VYSHAWN', 'WATKINS', '2023-05-31', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`) VALUES
(1, 'Mark', 'Tuggle', 'tugglem@rrjva.org', '$2y$10$94ecROvDG35ob5LibYX6uua7Gcx3pfj0gw0UU8J7NMuQKbv7K9DCu', 1),
(2, 'Heather', 'Scott', 'heather.scott@icsolutions.com', '$2y$10$IbC0Pe3DOmN0Y1z53XeSnuKskFaXo42VJXwbZbWrHKvYkdsHF3F/q', 2),
(8, 'qwe', 'qwe', 'qwe', '$2y$10$WgGI1twksNDFLvyRt03f0ueEZxFrbEB13zrRtF.fKUxpkMHPB2rcG', 1),
(9, 'asd', 'asd', 'tugglem@rrjva.org', '$2y$10$Qpm9Inxalf2OUsUe1OByFupxJ.hSs.46WeirdODlZDYRFjYc64b9.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
