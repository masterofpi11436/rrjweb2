-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:07 PM
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
(238, 'SHOWER SHOES 3XL/15&16', 5, ''),
(242, 'sdfgdsfgh', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_type` (`item_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type`) REFERENCES `item_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
