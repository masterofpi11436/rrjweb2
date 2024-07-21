-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `cell`
--

CREATE TABLE `cell` (
  `id` int(11) NOT NULL,
  `pid` varchar(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `item_type`, `image`) VALUES
(4, 'BROOM HEAD (ea)', 1, ''),
(5, 'CENTER PULL TOWELS (ro)', 1, ''),
(6, 'DECK BRUSH 10\" (ea)', 1, ''),
(7, 'DUST MOP HEAD (ea) ', 1, ''),
(8, 'MOP HEAD GEN PURPOSE (ea) ', 1, ''),
(9, 'MOP HEAD f/SEALER (ea) ', 1, ''),
(10, 'CLOTH RAG (ea)', 1, ''),
(11, 'DUSTPAN (ea)', 1, ''),
(12, 'HAND SCRUB BRUSH 6\" (ea)', 1, ''),
(13, 'TOILET BOWL BRUSH (ea) ', 1, ''),
(14, 'SPRAY BOTTLE 1 QT (ea) ', 1, ''),
(15, 'SPRAY HEAD f/BT (ea) ', 1, ''),
(16, 'TRASH BAGS SM (ro) ', 1, ''),
(17, 'TRASH BAGS MED (bx) ', 1, ''),
(18, 'TRASH BAGS LG (bx) ', 1, ''),
(19, 'PLASTIC BAGS f/RECYCLING (ro) ', 1, ''),
(21, 'BUFF PAD CHAMPAGINE (ea)', 1, ''),
(22, 'POLISHING PAD WHITE (ea) ', 1, ''),
(23, 'STRIP PAD BLACK (ea)', 1, ''),
(24, 'CLEAN PAD GREEN (ea) ', 1, ''),
(25, 'PAPER TOWELS MFLD (cs) ', 1, ''),
(26, 'TOILET PAPER (cs) ', 1, ''),
(27, 'VINYL, GLOVES, PF,MED (bx) ', 1, ''),
(28, 'VINYL, GLOVES, PR, LG (bx) ', 1, ''),
(29, 'VINYL, GLOVES, PF, XL (bx) ', 1, ''),
(30, 'GLOVES FOOD HANDLING (pk)', 1, ''),
(31, 'MELT-A-WAY LAUNDRY BAGS (bx)', 1, ''),
(32, 'GREEN ANTIBACT HAND SOAP (ea)', 1, ''),
(33, 'ANTIBACT FOAM HAND SOAP (ea)', 1, ''),
(34, 'RAZOR (bx', 1, ''),
(36, 'SOLAR BRITE (5gl) ', 1, ''),
(37, 'SANITARY NAPKINS (bx)', 1, ''),
(38, 'SO FRESH (5gl)', 1, ''),
(39, 'STAIN BLASTER (pk) ', 1, ''),
(40, 'GROUT SAFE (gl)', 1, ''),
(41, 'GLASS CLEANER (bt) ', 1, ''),
(42, 'NABC1 (bt) ', 1, ''),
(43, 'TRI BASE (gl)', 1, ''),
(44, 'PUMP SPRAY (gl)', 1, ''),
(45, 'SCUM B GONE (bt)', 1, ''),
(46, 'RRJ LEAVE REQUEST FORM (pk)', 2, ''),
(47, 'TABLET STANDARD (ea)', 2, ''),
(48, 'STENO NOTE BOOK (ea) ', 2, ''),
(49, 'POST IT LARGE (pk)', 2, ''),
(50, 'LOG BOOK 300PG (ea)', 2, ''),
(51, 'ENVELOPE COIN (bx)', 2, ''),
(52, 'ENVELOPE INTER OFFICE (ea) ', 2, ''),
(53, 'ENVELOPE WINDOW (bx) ', 2, ''),
(54, 'ENVELOPE 9 X 12 (bx)', 2, ''),
(55, 'ENVELOPE 10X15 (bx)', 2, ''),
(56, 'ENVELOPE STD. WHITE (bx)', 2, ''),
(57, 'CLIP PLASTIC MEDIUM (bx) ', 2, ''),
(58, 'CLIP PLASTIC LARGE (bx) ', 2, ''),
(59, 'CLIP PLASTIC XTRA-LG(bx) ', 2, ''),
(60, 'PEN BLACK (bx)', 2, ''),
(61, 'PEN RED (bx) ', 2, ''),
(62, 'PENCILS (pk) ', 2, ''),
(63, 'MARKERS BLACK (ea) ', 2, ''),
(64, 'HIGHLITER YEL (ea) ', 2, ''),
(65, 'DRY ERASE MKR (PK) ', 2, ''),
(66, 'DRY ERASER (ea) ', 2, ''),
(67, 'POCKET PORTFOLIO (ea)', 2, ''),
(68, 'LASER LABELS 1/3 CUT (pk)', 2, ''),
(69, 'LASER LABELS MAILING (pk)', 2, ''),
(70, 'LASER LABELS 1\" X 2 5/8\" (bx)', 2, ''),
(71, 'FILE FOLDER STD (bx)', 2, ''),
(72, 'BATTERY AA CELL (ea)', 2, ''),
(73, 'BATTERY AAA CELL (ea)', 2, ''),
(74, 'BATTERY C CELL (ea)', 2, ''),
(75, 'BATTERY D CELL (ea)', 2, ''),
(76, 'BATTERY 9 VOLT (ea)', 2, ''),
(77, 'STAPLER (ea) (staple-less)', 2, ''),
(78, 'TAPE TRANSPARENT (ro)', 2, ''),
(79, 'RUBBER BANDS (pk)', 2, ''),
(80, 'WHITEOUT PEN (ea)', 2, ''),
(81, 'WHITEOUT (bt)', 2, ''),
(82, 'TNG/CLASS RECORD FOLDER (bx)', 2, ''),
(83, 'PERSONNEL RECORD FOLDER (bx)', 2, ''),
(84, 'SUPERVISOR RECORD FOLDER (bx)', 2, ''),
(85, 'HANGING FILE STD (bx)', 2, ''),
(86, 'HANGING FILE LEGAL (bx)', 2, ''),
(87, 'COPY PAPER 8.5x11 (cs)', 2, ''),
(88, 'BANKER BOX, LTR, lg (ea)', 2, ''),
(89, 'BANKER BOX, LEGAL (ea)', 2, ''),
(90, 'BANKER BOX, LTR, sm (ea)', 2, ''),
(91, 'Q5949X (ea)', 3, ''),
(92, 'CB436A (ea)', 3, ''),
(93, 'CE278A (ea)', 3, ''),
(94, 'Q7553X (ea)', 3, ''),
(95, 'CE505X (ea)', 3, ''),
(96, '0 C4127X (ea)', 3, ''),
(97, 'CC364A (ea)', 3, ''),
(98, 'C8061X (ea)', 3, ''),
(99, '600 (ea)', 3, ''),
(100, 'D130 (ea)', 3, ''),
(101, 'BROTHER 350 (ea)', 3, ''),
(102, '98X (ea)', 3, ''),
(103, 'CF280A (ea)', 3, ''),
(104, '92A (ea)', 3, ''),
(105, 'C7115X (ea)', 3, ''),
(106, 'Q2613 (ea)', 3, ''),
(107, 'Dustpan (ea)', 4, ''),
(108, 'Hand Scrub Brush (ea)', 4, ''),
(109, 'Toilet Bowl Brush (ea)', 4, ''),
(110, 'Straw Broom (ea)', 4, ''),
(111, 'Mop Handle (ea)', 4, ''),
(112, 'Broom Handle (ea)', 4, ''),
(116, 'SEALER WAY (gl)', 1, ''),
(117, 'STRIPPER (gl)', 1, ''),
(118, 'BLEACH', 1, ''),
(119, 'H2 ORANGE (gl)', 1, ''),
(157, 'Green Jumpers Med', 5, ''),
(158, 'Green Jumpers LG', 5, ''),
(159, 'Green Jumpers XL', 5, ''),
(160, 'Green Jumpers 2XL', 5, ''),
(161, 'Green Jumpers 3XL', 5, ''),
(162, 'Green Jumpers 4XL', 5, ''),
(163, 'Green Jumpers 5XL', 5, ''),
(164, 'Green Jumpers 6XL', 5, ''),
(165, 'Green Jumpers 7XL', 5, ''),
(166, 'Green Jumpers 8XL', 5, ''),
(167, 'Green Jumpers 9XL', 5, ''),
(168, 'Green Jumpers 10XL', 5, ''),
(169, 'GYM SHORTS SM', 5, ''),
(170, 'GYM SHORTS MED', 5, ''),
(171, 'GYM SHORTS LG', 5, ''),
(172, 'GYM SHORTS XL', 5, ''),
(173, 'GYM SHORTS 2XL', 5, ''),
(174, 'GYM SHORTS 3XL', 5, ''),
(175, 'GYM SHORTS 4XL', 5, ''),
(176, 'FEMAL BRIEFS SM/5', 5, ''),
(177, 'FEMAL BRIEFS MED/6', 5, ''),
(178, 'FEMAL BRIEFS LG/7', 5, ''),
(179, 'FEMAL BRIEFS XL/8', 5, ''),
(180, 'FEMAL BRIEFS 2XL/9', 5, ''),
(181, 'FEMAL BRIEFS 3XL/10', 5, ''),
(182, 'FEMAL BRIEFS 4XL/11', 5, ''),
(183, 'FEMAL BRIEFS 5XL/12', 5, ''),
(184, 'FEMAL BRIEFS 6XL/13', 5, ''),
(185, 'FEMAL BRIEFS 7XL/14', 5, ''),
(186, 'BRA SIZE 32', 5, ''),
(187, 'BRA SIZE 34', 5, ''),
(188, 'BRA SIZE 36', 5, ''),
(189, 'BRA SIZE 38', 5, ''),
(190, 'BRA SIZE 40', 5, ''),
(191, 'BRA SIZE 42', 5, ''),
(192, 'BRA SIZE 44', 5, ''),
(193, 'BRA SIZE 46', 5, ''),
(194, 'MENS BRIEFS SM', 5, ''),
(195, 'MENS BRIEFS MED', 5, ''),
(196, 'MENS BRIEFS LG', 5, ''),
(197, 'MENS BRIEFS XL', 5, ''),
(198, 'MENS BRIEFS 2XL', 5, ''),
(199, 'MENS BRIEFS 3XL', 5, ''),
(200, 'MENS BRIEFS 4XL', 5, ''),
(201, 'T-SHIRTS SM', 5, ''),
(202, 'T-SHIRTS MED', 5, ''),
(203, 'T-SHIRTS LG', 5, ''),
(204, 'T-SHIRTS XL', 5, ''),
(205, 'T-SHIRTS 2XL', 5, ''),
(206, 'T-SHIRTS 3XL', 5, ''),
(207, 'T-SHIRTS 4XL', 5, ''),
(208, 'T-SHIRTS 5XL', 5, ''),
(209, 'T-SHIRTS 6XL', 5, ''),
(210, 'T-SHIRTS 7XL', 5, ''),
(211, 'T-SHIRTS 8XL', 5, ''),
(212, 'T-SHIRTS 9XL', 5, ''),
(213, 'T-SHIRTS 10XL', 5, ''),
(214, 'SHEETS', 5, ''),
(215, 'BLANKETS', 5, ''),
(216, 'GRAY BLANKETS', 5, ''),
(217, 'WASH CLOTHES', 5, ''),
(218, 'TOWELS', 5, ''),
(219, 'CUPS', 5, ''),
(220, 'SPOONS', 5, ''),
(221, 'SHOES SIZE 5', 5, ''),
(222, 'SHOES SIZE 6', 5, ''),
(223, 'SHOES SIZE 7', 5, ''),
(224, 'SHOES SIZE 8', 5, ''),
(225, 'SHOES SIZE 9', 5, ''),
(226, 'SHOES SIZE 10', 5, ''),
(227, 'SHOES SIZE 11', 5, ''),
(228, 'SHOES SIZE 12', 5, ''),
(229, 'SHOES SIZE 13', 5, ''),
(230, 'SHOES SIZE 14', 5, ''),
(231, 'SHOES SIZE 15', 5, ''),
(232, 'SHOES SIZE 16', 5, ''),
(233, 'SHOWER SHOES SM/5&6', 5, ''),
(234, 'SHOWER SHOES MED/7&8', 5, ''),
(235, 'SHOWER SHOES LG/9&10', 5, ''),
(236, 'SHOWER SHOES XL/11&12', 5, ''),
(237, 'SHOWER SHOES 2XL/13&14', 5, ''),
(238, 'SHOWER SHOES 3XL/15&16', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`id`, `type`) VALUES
(1, 'Housekeeping Supplies'),
(2, 'Office Supplies'),
(3, 'Printer Ink'),
(4, '1 for 1 Exchange'),
(5, 'Property');

-- --------------------------------------------------------

--
-- Table structure for table `mailroom`
--

CREATE TABLE `mailroom` (
  `id` int(11) NOT NULL,
  `inmate_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` enum('denied','approved','pending supervisor approval','pending warehouse approval') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_at` datetime DEFAULT NULL,
  `approved_by` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `supervisor_id`, `section_id`, `items`, `status`, `created_at`, `approved_at`, `approved_by`) VALUES
(7, 4, 4, 3, '{\"4\":{\"id\":4,\"name\":\"BROOM HEAD (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":1}}', 'approved', '2024-07-20 13:27:56', '2024-07-20 19:28:03', 1),
(8, 4, 4, 3, '{\"4\":{\"id\":4,\"name\":\"BROOM HEAD (ea)\",\"item_type\":1,\"image\":\"\",\"quantity\":1}}', 'denied', '2024-07-20 13:36:34', '2024-07-20 19:36:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `church_locator` varchar(255) DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `experience_training` varchar(255) DEFAULT NULL,
  `degree_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `race` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `document_status` varchar(255) DEFAULT NULL,
  `church_address` varchar(255) DEFAULT NULL,
  `church_leader` varchar(255) DEFAULT NULL,
  `church_phone` varchar(255) DEFAULT NULL,
  `specific_skill_education` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `quarter_meeting_attended` date DEFAULT NULL,
  `vol_dinner_rsvp` tinyint(1) DEFAULT NULL,
  `dinner_guest` tinyint(1) DEFAULT NULL,
  `attended_quarterly_meeting` tinyint(1) DEFAULT NULL,
  `active_inactive_terminated` varchar(255) DEFAULT NULL,
  `activity_status` varchar(255) DEFAULT NULL,
  `ministry_group` varchar(255) DEFAULT NULL,
  `chaplain_assistant` varchar(255) DEFAULT NULL,
  `on_call_schedule` varchar(255) DEFAULT NULL,
  `on_call_status` tinyint(1) DEFAULT NULL,
  `birth_month` date DEFAULT NULL,
  `minisitry_orientation` date DEFAULT NULL,
  `volume_manual_number` int(255) DEFAULT NULL,
  `prea_training` date DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `hu6` varchar(255) DEFAULT NULL,
  `denomination` varchar(255) DEFAULT NULL,
  `devices_approved` varchar(255) DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `termination_reason` varchar(255) DEFAULT NULL,
  `is_volunteer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'phone'),
(4, 'mailroom'),
(5, 'program'),
(6, 'contractor'),
(7, 'volunteer'),
(8, 'manager'),
(9, 'supervisor'),
(10, 'user'),
(11, 'warehouse supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`) VALUES
(3, 'Housing Unit 1'),
(4, 'Housing Unit 2'),
(5, 'Housing Unit 3'),
(6, 'Housing Unit 4'),
(8, 'Housing Unit 5'),
(9, 'Housing Unit 6'),
(10, 'Booking'),
(11, 'Administration'),
(12, 'Medical Housing'),
(13, 'Classification'),
(14, 'Records'),
(15, 'Maintenance'),
(16, 'Housekeeping'),
(17, 'HUM'),
(18, 'Programs'),
(19, 'SEC'),
(20, 'C&T'),
(21, 'Warehouse');

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
  `is_reported` tinyint(1) DEFAULT NULL,
  `is_filed` tinyint(1) DEFAULT NULL,
  `is_charged` tinyint(1) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `role_id` int(11) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `reset_token`, `token_expiry`) VALUES
(1, 'asd', 'asd', 'asd', '$2y$10$.MSZ5kGDsFRHK9Ph8s5KuOuxrXrwujI72NnDtjrwMUv4A7BtvOlFm', 1, NULL, NULL),
(2, 'Mark', 'Tuggle', 'masterofpi11436@gmail.com', '$2y$10$eRJ/D95EIa39TNFnwVTLhu5PeDXTjx/c7pvn0Q9dIwdYg.IHqeIh.', 1, NULL, NULL),
(3, 'zxc', 'zxc', 'zxc', '$2y$10$0wmWF0CqD3eDy5eDWqTLTuUP8TjwkvFdqMWS.NdqnEfFOBPPpoGsO', 8, NULL, NULL),
(4, 'qwe', 'qwe', 'qwe', '$2y$10$5rvKwonCxpcZPvd0t2aiaO0Xt0h5ARC8R3sUTlGQsX/kmz0GAjVRi', 9, NULL, NULL),
(5, 'zxczxc', 'zxczxc', 'zxczxc', '$2y$10$x0ONzdZ79hyOOn9yEu4Wsel7SbMmP0Adn9VqzQScqpVeT2B34HDNS', 10, NULL, NULL),
(8, 'qweqwe', 'qweqwe', 'qweqwe', '$2y$10$2HRJBw1.QmvMMjrWORKjmeOcXEg8yx5XQXVCS0BQvN8lupehxT1j.', 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cell`
--
ALTER TABLE `cell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_type` (`item_type`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailroom`
--
ALTER TABLE `mailroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
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
-- AUTO_INCREMENT for table `cell`
--
ALTER TABLE `cell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mailroom`
--
ALTER TABLE `mailroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
