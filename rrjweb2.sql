-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 09:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`id`, `pid`, `description`, `name`, `phone`, `email`, `number`) VALUES
(4, '395', 'IT SUPPORT TECHNICIAN', 'TUGGLE, MARK A', '(804) 630-4730', 'tugglem@rrjva.org', '3100'),
(5, '1', 'SUPERINTENDENT', 'LEABOUGH, LARRY J', '(804) 841-1212', 'lleabough@rrjva.org', '2865'),
(6, '10', 'CAPTAIN', 'SMITH, JEFFREY A', '(804) 712-5878', 'smith.jeffrey@rrjva.org', '1544'),
(7, '104', 'JAIL OFFICER', 'MASON, JASEN D', '(804) 721-7677', 'mason.jasen@rrjva.org', '1030'),
(8, '109', 'JAIL OFFICER', 'JONES, CHRISTY N', '(804) 861-4738', 'jones.christy@rrjva.org', '1031'),
(9, '110', 'JAIL OFFICER', 'WILLIAMS, TYRONE', '(804) 678-9224', 'williams.tyrone@rrjva.org', '2828'),
(10, '111', 'JAIL OFFICER', 'PARKER, KEITH JM', '(571) 684-4805', 'parkerk@rrjva.org', '3136'),
(11, '112', 'JAIL OFFICER', 'LANGFORD, CHANDA N', '(804) 192-2746', 'langfordc@rrjva.org', '3139'),
(12, '115', 'JAIL OFFICER', 'ELEY, TAKEITA L', '(757) 715-5323', 'takeita.eley@gmail.com', '2996'),
(13, '117', 'JAIL OFFICER', 'DIX, JONATHAN T', '(804) 509-9682', 'dixj@rrjva.org', '3071'),
(14, '118', 'JAIL OFFICER', 'BUTLER, STEVEN W', '(804) 520-0505', 'butler.steven@rrjva.org', '3038'),
(15, '119', 'JAIL OFFICER', 'WINSTON, LATASHA T', '(804) 485-3767', 'winston.latasha@rrjva.org', '2935'),
(16, '12', 'CAPTAIN', 'MASON, LAKEISHA S', '(804) 122-2359', 'lmason@rrjva.org', '725'),
(17, '120', 'JAIL OFFICER', 'BROWN, ANTHONY M', '(804) 898-0909', 'browna@rrjva.org', '3122'),
(18, '123', 'JAIL OFFICER', 'MOSLEY, LANASIA N', '(434) 652-2779', 'mosley.lanasia@rrjva.org', '3018'),
(19, '125', 'JAIL OFFICER', 'CARBAUGH, CARL E', '(804) 778-5203', 'carbaugh1963@outlook.com', '1345'),
(20, '126', 'JAIL OFFICER', 'GAUNAY, JOSEPH D', '(518) 941-1455', 'gaunayj@rrjva.org', '3065'),
(21, '129', 'JAIL OFFICER', 'BENNETT, KEVIN M', '(804) 489-9323', 'bennett.kevin@rrjva.org', '3014'),
(22, '13', 'CAPTAIN', 'SAMPLE, NICHOLAS A', '(804) 926-4543', 'sample.nicholas@rrjva.org', '1468'),
(23, '132', 'JAIL OFFICER', 'OLDS, EARNESTO T', '(434) 228-1509', 'olds.earnesto@rrjva.org', '1140'),
(24, '133', 'JAIL OFFICER', 'YATES, LASHAY N', '(757) 185-5855', 'yates.lashay@rrjva.org', '2671'),
(25, '138', 'JAIL OFFICER', 'HOPKINS, BREAZHANE C', '(585) 351-1295', 'hopkins.breazhane@rrjva.org', '2831'),
(26, '14', 'LIEUTENANT-COMPLIANC', 'LAVIGNE, JOSEPH W', '(931) 575-8582', 'lavigne.joseph@rrjva.org', '2410'),
(27, '140', 'JAIL OFFICER', 'HOLLOWAY, TERENCE L', '(571) 759-9471', 'hollowayt@rrjva.org', '3116'),
(28, '141', 'JAIL OFFICER', 'ENOS, ANDREW J', '(562) 610-0797', 'enos.andrew@rrjva.org', '3015'),
(29, '143', 'JAIL OFFICER', 'DUDLEY, JAMES M', '(804) 795-5447', 'dudley.james@rrjva.org', '2959'),
(30, '144', 'JAIL OFFICER', 'TAYLOR, TEOSHA R', '(804) 653-3659', 'taylor.te\'osha@rrjva.org\'', '2960'),
(31, '145', 'JAIL OFFICER', 'PATTERSON, JOHN B', '(804) 502-1132', 'patterson.john@rrjva.org', '3042'),
(32, '146', 'JAIL OFFICER', 'COLEMAN, NICHOLAS A', '(804) 704-0375', 'colemann@rrjva.org', '3060'),
(33, '148', 'JAIL OFFICER', 'MAXWELL, GRADY C', '(757) 255-5596', 'maxwellg@rrjva.org', '3051'),
(34, '15', 'LIEUTENANT-OPERATION', 'PURYEAR, DAWN C', '(804) 874-3727', 'puryear.dawn@rrjva.org', '2142'),
(35, '150', 'JAIL OFFICER', 'WILHITE, KENNETH D', '(252) 646-8888', 'wilhitek@rrjva.org', '3062'),
(36, '151', 'JAIL OFFICER', 'REINCKE, STEVEN F', '(804) 490-5927', 'reincke.steven@rrjva.org', '2687'),
(37, '152', 'JAIL OFFICER', 'MOSLEY, AUSTIN E', '(804) 968-8779', 'mosley.austin@rrjva.org', '2856'),
(38, '158', 'JAIL OFFICER', 'MOORE, ANGELA D', '(804) 605-2069', 'moore.angela@rrjva.org', '639'),
(39, '16', 'LIEUTENANT-OPERATION', 'LEABOUGH, EDWARD J', '(804) 685-5859', 'leabough.edward@rrjva.org', '2930'),
(40, '160', 'JAIL OFFICER', 'LUNDY, BETHENIA L', '(804) 528-7832', 'lundy.bethenia@rrjva.org', '2251'),
(41, '161', 'JAIL OFFICER', 'ANDREWS, JASON M', '(919) 229-3167', 'andrewsj@rrjva.org', '3074'),
(42, '162', 'JAIL OFFICER', 'BREEDEN, KIMBERLY A', '(804) 201-0481', 'breeden.kimberly@rrjva.org', '2301'),
(43, '163', 'JAIL OFFICER', 'YERBY, JAYSON R', '(804) 586-1312', 'yerbyj@rrjva.org', '3061'),
(44, '167', 'JAIL OFFICER', 'LEE, WILLIAM', '(347) 953-3577', 'leew@rrjva.org', '3138'),
(45, '169', 'JAIL OFFICER', 'HAYES, GARY B', '(804) 201-1566', 'hayes.gary@rrjva.org', '2765'),
(46, '171', 'JAIL OFFICER - OPR', 'COLEMAN, GARRY W', '(804) 352-5481', 'gcoleman@rrjva.org', '878'),
(47, '172', 'JAIL OFFICER', 'WRIGHT, ROBIN D', '(804) 720-2293', 'wrightr@rrjva.org', '3135'),
(48, '173', 'JAIL OFFICER', 'WHITE, COURTNEY L', '(804) 926-1638', 'white.courtney@rrjva.org', '2991'),
(49, '174', 'JAIL OFFICER', 'BRYANT, TAMMY C', '(804) 481-2094', 'bryant.tammy@rrjva.org', '1574'),
(50, '175', 'JAIL OFFICER', 'CRAWFORD, MARVIN L', '(804) 529-9618', 'crawfordm@rrjva.org', '3115'),
(51, '178', 'JAIL OFFICER', 'JONES, ALFONZO D', '(804) 624-7254', 'jones.alfonzo@rrjva.org', '2368'),
(52, '179', 'JAIL OFFICER', 'BRATCHER, BRANDON V', '(804) 615-0208', 'bratcherb@rrjva.org', '3125'),
(53, '18', 'LIEUTENANT-OPERATION', 'HOBBS, JAMECE C', '(804) 733-0940', 'jhobbs@rrjva.org', '936'),
(54, '182', 'JAIL OFFICER', 'LEAKE, SYDNI M', '(804) 366-6616', 'leakes@rrjva.org', '3129'),
(55, '183', 'JAIL OFFICER', 'ANDERSON, JERMAINE L', '(808) 465-6367', 'andersonj@rrjva.org', '3126'),
(56, '184', 'JAIL OFFICER', 'NORMENT, HANNAH L', '(872) 444-0864', 'normenth@rrjva.org', '3128'),
(57, '185', 'JAIL OFFICER', 'VAUGHAN, KELISA L', '(804) 350-0351', 'vaughank@rrjva.org', '3052'),
(58, '186', 'JAIL OFFICER', 'WASHINGTON, ALESHIA N', '(804) 704-9279', 'washingtona@rrjva.org', '3134'),
(59, '188', 'JAIL OFFICER', 'DABNEY, JEVON M', '(804) 491-1566', 'dabney.jevon@rrjva.org', '2840'),
(60, '196', 'JAIL OFFICER', 'LANDS, MICHAEL A', '(229) 760-0401', 'landsm@rrjva.org', '3085'),
(61, '197', 'JAIL OFFICER', 'GARNES, COREY K', '(804) 398-8608', 'garnes.corey@rrjva.org', '2972'),
(62, '198', 'JAIL OFFICER', 'CALDWELL, JANIE E', '(804) 517-7041', 'caldwellj@rrjva.org', '3110'),
(63, '2', 'ASST SUPERINTENDENT', 'ARMSTRONG, CHARLES E', '(804) 400-4354', 'carmstrong@rrjva.org', '2778'),
(64, '20', 'LIEUTENANT-OPERATION', 'CULVER, MARK S', '(804) 397-7576', 'culverm@rrjva.org', '2014'),
(65, '204', 'JAIL OFFICER', 'SAUNDERS, STACEY Y', '(804) 687-0998', 'saunders.stacey@rrjva.org', '957'),
(66, '207', 'JAIL OFFICER', 'ESCOBAR, BRYAN M', '(804) 557-7029', 'escobarb@rrjva.org', '3076'),
(67, '21', 'LIEUTENANT-OPERATION', 'SANDERS, WILLIAM R', '(804) 895-1729', 'wsanders@rrjva.org', '778'),
(68, '213', 'JAIL OFFICER', 'PROCOPIO, PATRICIA R', '(252) 393-3621', 'procopio.patricia@rrjva.org', '2985'),
(69, '215', 'JAIL OFFICER', 'MCCAULEY, BRITTNEY J', '(804) 878-8834', 'mccauley.brittney@rrjva.org', '2987'),
(70, '216', 'JAIL OFFICER', 'BONNER, NATHANIEL D', '(804) 631-2467', 'bonner.nathaniel@rrjva.org', '1537'),
(71, '217', 'JAIL OFFICER', 'BLAND, MARCELLUS O', '(434) 848-5675', 'blandm@rrjva.org', '3083'),
(72, '22', 'LIEUTENANT OPERATION', 'WHITEBREAD, GERALD J', '(804) 731-1293', 'gwhitebread@rrjva.org', '671'),
(73, '220', 'JAIL OFFICER', 'MAYES, JOSHUA R', '(804) 352-8276', 'mayes.joshua@rrjva.org', '2414'),
(74, '23', 'LIEUTENANT-OPERATION', 'WHIRLEY, STONEY L', '(804) 265-7143', 'whirley.stoney@rrjva.org', '1012'),
(75, '231', 'JAIL OFFICER', 'DOYLE, TY C', '(804) 010-0205', 'doyle.ty@rrjva.org', '3006'),
(76, '237', 'JAIL OFFICER', 'HARRISON, LEZANNE N', '(804) 541-9074', 'harrison.lezanne@rrjva.org', '764'),
(77, '238', 'JAIL OFFICER', 'EVANS, ATHENA S', '(804) 319-9543', 'evans.athena@rrjva.org', '2896'),
(78, '239', 'JAIL OFFICER', 'HAGEN, SAVANNAH L', '(804) 311-1952', 'hagen.savannah@rrjva.org', '3007'),
(79, '24', 'LIEUTENANT-OPERATION', 'BROWN, BRYAN S', '(804) 454-5449', 'brown.bryan@rrjva.org', '1739'),
(80, '243', 'JAIL OFFICER', 'HOLMES, JASMINE D', '(804) 485-5388', 'holmesj@rrjva.org', '3103'),
(81, '248', 'JAIL OFFICER', 'DOWDY, JONATHAN D', '(804) 203-5298', 'dowdy.jonathan@rrjva.org', '1788'),
(82, '249', 'JAIL OFFICER', 'HINSON, FRANKLIN M', '(804) 010-0424', 'hinsonf@rrjva.org', '3107'),
(83, '25', 'LIEUTENANT-OPERATION', 'NICKELBERRY, RAVEN M', '(804) 720-2575', 'nickelberry.raven@rrjva.org', '1208'),
(84, '252', 'JAIL OFFICER', 'BULLOCK, BRITTNEY N', '(336) 494-5022', 'bullockb@rrjva.org', '2588'),
(85, '257', 'JAIL OFFICER', 'ROYALL, KIYERRAH S', '(804) 245-9784', 'royall.kiyerrah@rrjva.org', '2807'),
(86, '26', 'LIEUTENANT-OPERATION', 'JORDAN, LEON A', '(804) 926-4063', 'ljordan@rrjva.org', '594'),
(87, '260', 'JAIL OFFICER', 'GRANT, GREGORY', '(804) 231-7752', 'grant.gregory@rrjva.org', '1815'),
(88, '262', 'JAIL OFFICER', 'SANTOS, JOSE L', '(804) 267-7841', 'santosj@rrjva.org', '3096'),
(89, '265', 'JAIL OFFICER', 'HEARE, BRITTANI M', '(804) 605-4206', 'heare.brittani@rrjva.org', '2274'),
(90, '266', 'JAIL OFFICER', 'AUTERY, ANTHONY L', '(804) 325-7933', 'auterya@rrjva.org', '3101'),
(91, '27', 'LIEUTENANT-TRAINING', 'ROSE, LISA W', '(804) 481-0802', 'lrose@rrjva.org', '539'),
(92, '274', 'JAIL OFFICER', 'JACKSON, DEREK L', '(804) 026-6193', 'jackson.derek@rrjva.org', '2677'),
(93, '278', 'JAIL OFFICER', 'WOLLSTEIN, ADAM AC', '(804) 229-1200', 'wollsteina@rrjva.org', '3132'),
(94, '279', 'JAIL OFFICER', 'FIELDS, LINETTE J', '(252) 780-0166', 'fieldsl@rrjva.org', '3030'),
(95, '28', 'LIEUTENANT-OPERATION', 'JONES, CHARLENE R', '(804) 721-4283', 'jones.charlene@rrjva.org', '633'),
(96, '287', 'JAIL OFFICER', 'MARLIN, JESSE M', '(804) 616-2233', 'marlin.jesse@rrjva.org', '2338'),
(97, '288', 'JAIL OFFICER', 'DAILEY, DONALD Q', '(804) 720-5189', 'dailey.donald@rrjva.org', '1863'),
(98, '29', 'LIEUTENANT-OPERATION', 'JONES, KENYATTA C', '(804) 888-2210', 'jones.kenyatta@rrjva.org', '838'),
(99, '3', 'MAJOR/COMMUNITY CORR', 'MACK, TOJUANNA Y', '(804) 520-8217', 'tmack@rrjva.org', '1075'),
(100, '30', 'SERGEANT-CLASSIFICAT', 'HARTSELL, DANA M', '(804) 931-9218', 'hartsell.dana@rrjva.org', '1022'),
(101, '308', 'JAIL OFFICER', 'TANNER, KAYLA C', '(804) 892-7289', 'tanner.kayla@rrjva.org', '2581'),
(102, '309', 'PURCHASING TECHNICIA', 'HARRIS, PATRICE L', '(434) 322-2524', 'harris.patrice@rrjva.org', '2785'),
(103, '316', 'MAINT TECHNICIAN', 'FARRAR, JOSEPH C', '(804) 953-3961', 'farrar.joseph@rrjva.org', '2894'),
(104, '317', 'WAREHOUSE TECHNICIAN', 'PARHAM, SHARON R', '(804) 212-2766', 'parham.sharon@rrjva.org', '2916'),
(105, '318', 'MAINTENANCE TECH', 'PAYNE, WARREN R', '(804) 691-8735', 'payne.warren@rrjva.org', '2102'),
(106, '319', 'WAREHOUSE SUPERVISOR', 'WATSON, CHARLES R', '(804) 895-2646', 'watson.charles@rrjva.org', '1688'),
(107, '320', 'MAINT TECHNICIAN', 'BOWMAN, JOHN T', '(804) 590-5990', 'bowman.john@rrjva.org', '2709'),
(108, '321', 'MAINT TECHNICIAN', 'MOUNIE, DAVID A', '(804) 892-7150', 'mounied@rrjva.org', '2667'),
(109, '322', 'MAINT TECHNICIAN', 'PARKER, DARNELL F', '(804) 919-0198', 'parker.darnell@rrjva.org', '2328'),
(110, '323', 'MAINT TECHNICIAN', 'HUBBARD, LARRY JE', '(980) 857-7940', 'hubbard.larry@rrjva.org', '2990'),
(111, '324', 'MAINT TECHNICIAN', 'MASON, JAMES F', '(804) 549-7336', 'mason.james@rrjva.org', '1405'),
(112, '325', 'MAINT SUPERVISOR', 'FEURY, LONNIE M', '(804) 731-4198', 'feury.lonnie@rrjva.org', '1004'),
(113, '327', 'MAINT TECHNICIAN', 'ELIADES, JOHN FM', '(804) 960-0072', 'eliades.john@rrjva.org', '2883'),
(114, '329', 'MAINT TECHNICIAN', 'MILLER, MARK R', '(804) 458-0086', 'miller.mark@rrjva.org', '834'),
(115, '33', 'SERGEANT-OPERATIONS', 'AUGUSTUS, KAREN L', '(347) 907-9173', 'augustus.karen@rrjva.org', '1859'),
(116, '331', 'CHIEF OF MAINT. & IN', 'FLEXON, TIMOTHY C', '(804) 631-9333', 'tflexon@rrjva.org', '679'),
(117, '332', 'RECORDS MANAGER', 'GREEN, DEMETRIA L', '(804) 605-2037', 'demetria.green@rrjva.org', '1549'),
(118, '335', 'RECORDS TECHNICIAN', 'DAVIS, CLIFFORD H', '(804) 275-1746', 'davis.clifford@rrjva.org', '2096'),
(119, '336', 'HR TECHNICIAN', 'MARLOWE, LISA K', '(804) 605-0761', 'lmarlowe@rrjva.org', '1291'),
(120, '34', 'SERGEANT-OPERATIONS', 'SHELTON, SUSAN C', '(804) 930-4919', 'shelton.susan@rrjva.org', '2229'),
(121, '341', 'MAINTENANCE MANAGER', 'MCDANIEL, MARK W', '(804) 526-0672', 'mmcdaniel@rrjva.org', '984'),
(122, '342', 'CASE WORKER', 'STOKES, CANDACE R', '(804) 385-5635', 'stokes.candace@rrjva.org', '2955'),
(123, '343', 'CASE WORKER', 'WEEKS, RICKY P', '(804) 339-9063', 'weeks.ricky@rrjva.org', '2984'),
(124, '344', 'CASE WORKER', 'GILES, REGINALD', '(804) 228-1608', 'rgiles@rrjva.org', '1148'),
(125, '345', 'HR MANAGER', 'WARD, SHELIA D', '(804) 861-3731', 'sward@rrjva.org', '1658'),
(126, '346', 'PURCHASING MANAGER', 'LEWIS JONES, TRINIKA A', '(804) 092-2137', 'tjones@rrjva.org', '2965'),
(127, '347', 'ACCOUNTING MANAGER', 'MONTIJO, MARIA E', '(804) 203-3517', 'mmontijo@rrjva.org', '1896'),
(128, '348', 'ADMINISTRATIVE ASSIS', 'TURNER, VICKI L', '(706) 957-7583', 'turner.vicki@rrjva.org', '2285'),
(129, '35', 'SERGEANT-OPERATIONS', 'MAYES, LYNNETTE C', '(804) 347-1939', 'mayes.lynnette@rrjva.org', '2241'),
(130, '350', 'CASE WORKER', 'SAVAGE, TERRI S', '(804) 884-4387', 'savage.terri@rrjva.org', '2964'),
(131, '352', 'OFFICE SPECIALIST SE', 'HUDSON, BONNIE P', '(804) 526-9682', 'bhudson@rrjva.org', '1479'),
(132, '357', 'OFFICE SPECIALIST SE', 'REEDY, LAURA M', '(804) 458-0892', 'REEDY.LAURA@rrjva.org', '1385'),
(133, '362', 'ACCOUNTING TECHNICIA', 'STRUBEL, KIMBERLY E', '(804) 316-6113', 'strubel.kimberly@rrjva.org', '2784'),
(134, '364', 'PROGRAMS MANAGER', 'COLEMAN, BABETTE R', '(804) 731-9258', 'bcoleman@rrjva.org', '536'),
(135, '365', 'FISCAL TECHNICIAN', 'FAZIO, PATRICIA A', '(804) 334-5533', 'pfazio@rrjva.org', '1322'),
(136, '367', 'OFFICE SPECIALIST SE', 'MINION, TERESA D', '(804) 668-2658', 'tminion@rrjva.org', '1483'),
(137, '37', 'SERGEANT-OPERATIONS', 'BRAGG, SHIANNE L', '(804) 295-8518', 'BRAGG.SHIANNE@RRJVA.ORG', '2764'),
(138, '372', 'RECORDS TECHNICIAN', 'FERGUSON, DENISE E', '(804) 243-2561', 'ferguson.denise@rrjva.org', '2294'),
(139, '373', 'LIDS TECHNICIAN', 'RANDOLPH, COURTNEY D', '(804) 200-9675', 'crandolph@rrjva.org', '1384'),
(140, '374', 'LIDS TECHNICIAN', 'CRENNEL, SHEILA F', '(804) 972-5739', 'crennel.sheila@rrjva.org', '2345'),
(141, '377', 'RECORDS TECHNICIAN', 'HOLMES, BRANDY E', '(804) 177-7609', 'holmes.brandy@rrjva.org', '2997'),
(142, '379', 'RECORDS TECHNICIAN', 'TAYLOR, SHANAE A', '(804) 454-5532', 'taylor.shanae@rrjva.org', '2007'),
(143, '38', 'LIEUTENANT', 'GREENWAY, LOFTON O', '(804) 714-7615', 'greenway.lofton@rrjva.org', '1248'),
(144, '39', 'SERGEANT', 'SPRATLEY, VIOLA A', '(804) 943-6284', 'spratley.viola@rrjva.org', '2141'),
(145, '391', 'BOOKING TECHNICIAN', 'BUFORD, CHERIDA R', '(804) 931-2881', 'buford.cherida@rrjva.org', '1579'),
(146, '392', 'RECORDS TECHNICIAN', 'MILES, CHARNEICE R', '(804) 357-7163', 'milesc@rrjva.org', '3086'),
(147, '4', 'MAJOR/DIRECTOR OF OP', 'PETERSON, KAWAN A', '(804) 721-1359', 'peterson.kawan@rrjva.org', '980'),
(148, '40', 'SERGEANT', 'EVANS, ALICIA M', '(757) 565-5724', 'evans.alicia@rrjva.org', '2902'),
(149, '406', 'VOLUNTEER COORD', 'WHITAKER, SABRINA M', '(804) 720-4910', 'whitaker.sabrina@rrjva.org', '1359'),
(150, '41', 'SERGEANT-OPERATIONS', 'JONES, KRISTONTA R', '(804) 550-8752', 'jones.kristonta@rrjva.org', '1649'),
(151, '411', 'CONTROL OPERATOR', 'CASAS, ALBERTA L', '(804) 712-0736', 'casas.alberta@rrjva.org', '2099'),
(152, '43', 'SERGEANT', 'BREWTON, NICHOLE M', '(804) 835-1813', 'brewton.nichole@rrjva.org', '2267'),
(153, '430', 'TC COUNSELOR', 'SPANGLER, KATHERINE M', '(804) 869-0666', 'swift.katherine@rrjva.org', '1711'),
(154, '437', 'CONTROL OPERATOR', 'TAYLOR, QUACHE B', '(804) 555-5672', 'taylorq@rrjva.org', '2605'),
(155, '439', 'CONTROL OPERATOR', 'WATSON, SHAQUITA M', '(804) 439-9295', 'watsons@rrjva.org', '3118'),
(156, '440', 'CONTROL OPERATOR', 'PETERKIN, INDIA M', '(804) 835-1376', 'peterkin.india@rrjva.org', '2618'),
(157, '444', 'CONTROL OPERATOR', 'MEARS, ADAM W', '(804) 861-0420', 'mears.adam@rrjva.org', '2177'),
(158, '445', 'CONTROL OPERATOR', 'WATSON, SHAKITA R', '(804) 931-0837', 'watson.shakita@rrjva.org', '2772'),
(159, '448', 'CONTROL OPERATOR', 'COUSIN, KIMBERLY L', '(804) 915-5020', 'COUSIN.KIMBERLY@RRJVA.ORG', '3046'),
(160, '45', 'SERGEANT', 'FERGUSON, MICHAEL A', '(804) 496-3878', 'ferguson.michael@rrjva.org', '1765'),
(161, '450', 'FACILITY PROG ADMIN', 'LEABOUGH, SANDRA N', '(804) 784-1212', 'leabough.sandra@rrjva.org', '2094'),
(162, '452', 'TC COUNSELOR', 'HALL, JAMES H', '(804) 526-6088', 'hall.james@rrjva.org', '2950'),
(163, '453', 'TC COUNSELOR', 'JENKINS, DEVAN S', '(703) 001-1093', 'jenkins.devan@rrjva.org', '2619'),
(164, '454', 'TC COUNSELOR', 'GREEN, CHANEL S', '(254) 020-0713', 'green.chanel@rrjva.org', '2963'),
(165, '458', 'RECORDS TECHNICIAN', 'JOLLY, CYNTHIA F', '(804) 481-6361', 'fulton.cynthia@rrjva.org', '2375'),
(166, '459', 'OFFICE SPECIALIST', 'JONES, DEETTA', '(804) 586-0417', 'jones.deetta@rrjva.org', '2617'),
(167, '46', 'SERGEANT', 'DOLAN, STACEY A', '(804) 928-3798', 'dolan.stacey@rrjva.org', '2172'),
(168, '460', 'DRIVER PART-TIME', 'BAKER, MARK', '(804) 399-7608', 'baker.mark@rrjva.org', '3039'),
(169, '464', 'DRIVER PART-TIME', 'FEURY, LONNIE M', '(804) 898-0585', 'lfeury@rrjva.org', '503'),
(170, '470', 'CERT PEER SUPRT SPEC', 'BLACKWELL, EDWARD', '(804) 530-5281', 'blackwell.edward@rrjva.org', '2593'),
(171, '471', 'RSAT CASEWORKER A/C', 'MUNFORD, AMARA K', '(718) 216-4837', 'munford.amara@rrjva.org', '2607'),
(172, '48', 'SERGEANT', 'BROWN, DAMARCUS A', 'Unknown', 'brown.damarcus@rrjva.org', '2929'),
(173, '49', 'SERGEANT', 'BINNS, MARQUISE D', '(757) 345-8397', 'binns.marquise@rrjva.org', '2994'),
(174, '5', 'DIRECTOR OF ADMINIST', 'REID, CRYSTAL H', '(804) 226-2691', 'creid@rrjva.org', '817'),
(175, '50', 'SERGEANT', 'BAINES, DERRELL A', '(804) 255-5354', 'baines.derrell@rrjva.org', '1814'),
(176, '501', 'JAIL OFFICER P/T', 'GIVENS, RUSSELL B', '(804) 553-3289', 'givensr@rrjva.org', '1229'),
(177, '502', 'JAIL OFFICER P/T', 'THOMAS, JEROME A', '(804) 898-1402', 'thomas.jerome@rrjva.org', '1054'),
(178, '503', 'JAIL OFFICER P/T', 'SEWARD, DERWIN C', '(804) 926-9092', 'sewardd@rrjva.org', '958'),
(179, '505', 'JAIL OFFICER P/T', 'HARRISON, ANDRE M', '(804) 541-9074', 'harrison.andre@rrjva.org', '943'),
(180, '507', 'CLASSIFICATION TECH', 'WALKER, DEQUANDA S', '(434) 642-2216', 'walkerd@rrjva.org', '3091'),
(181, '508', 'CLASSIFICATION TECH', 'JONES, JOANIE A', '(804) 266-6871', 'jones.joanie@rrjva.org', '2787'),
(182, '511', 'CLASSIFICATION TECH', 'KHAN, SHUMAILA Z', '(804) 740-0007', 'khan.shumaila@rrjva.org', '2920'),
(183, '512', 'AUDITOR', 'LOCUST, ERMA P', '(804) 434-4957', 'locust.erma@rrjva.org', '2866'),
(184, '517', 'LD. CASE WKR/COUNS', 'WORKMAN ROBINSON, BARBARA E', '(804) 475-7555', 'brobinson@rrjva.org', '1382'),
(185, '518', 'BOOKING TECHNICIAN', 'BRANCH, LASANDRA L', '(804) 300-2213', 'branch.lasandra@rrjva.org', '2892'),
(186, '520', 'MAINT TECHNICIAN P/T', 'HOLMES, WALTER W', '(804) 367-7297', '', '3058'),
(187, '521', 'ASST DIR OF ADMIN', 'COLEMAN, MICHELLE C', '(804) 860-0092', 'mcoleman@rrjva.org', '3049'),
(188, '522', 'QMHP SUPERVISOR', 'WATSON, SANDRA A', '(434) 294-1793', 'watsonsa@rrjva.org', '3120'),
(189, '523', 'QMHP', 'PITT, OLIVIA A', '(804) 049-9461', 'pitt.olivia@rrjva.org', '2967'),
(190, '524', 'QMHP', 'LEE, DIAMOND C', '(414) 532-5620', 'leed@rrjva.org', '3137'),
(191, '525', 'QMHP', 'SMITH, TANYANIKA', '(716) 330-0758', 'smitht@rrjva.org', '3127'),
(192, '527', 'PROPERTY TECHNICIAN', 'FULTON, NICOLE J', '(804) 919-9106', 'fulton.n@rrjva.org', '3057'),
(193, '53', 'SERGEANT', 'NIGHTENGALE, BRITTANY N', '(434) 390-8811', 'nightengale.brittany@rrjva.org', '2869'),
(194, '531', 'PSYCHIATRIST PT', 'CHAKRABORTY, BANDHAN', '(609) 327-7233', 'chakrabortyb@rrjva.org', '3140'),
(195, '532', 'PSYCHIATRIST PT', 'TUASON, AMENRA F', '(804) 996-6156', 'tuasona@rrjva.org', '3141'),
(196, '54', 'SERGEANT', 'HARRIS, KEIRETTA J', '(804) 332-8177', 'harris.keiretta@rrjva.org', '2725'),
(197, '55', 'SERGEANT', 'TRISVAN, SHAKALAN R', '(434) 294-6616', 'trisvan.shakalan@rrjva.org', '2657'),
(198, '56', 'SERGEANT', 'SAUNDERS, SHAMIKA L', '(804) 919-2146', 'saunders.shamika@rrjva.org', '2448'),
(199, '57', 'SERGEANT', 'JOHNSON, ARION A', '(804) 253-5025', 'johnson.arion@rrjva.org', '2600'),
(200, '58', 'SERGEANT', 'WILLIAMS, DOMONIQUE L', '(804) 715-0069', 'williams.domonique@rrjva.org', '2734'),
(201, '59', 'SERGEANT', 'PALUCH, CHESTER JOHN ROBERT', '(804) 513-6214', 'PALUCH.CHESTER@RRJVA.ORG', '2636'),
(202, '60', 'SERGEANT', 'JONES, MARKEISHA D', '(804) 853-3696', 'jones.markeisha@rrjva.org', '2801'),
(203, '62', 'SERGEANT', 'MARLOWE, JEREMY N', '(804) 926-5333', 'nmarlowe@rrjva.org', '883'),
(204, '63', 'SERGEANT', 'HALPAIN, MARK A', '(804) 318-7292', 'halpain.mark@rrjva.org', '2470'),
(205, '64', 'SERGEANT', 'PALMER, WANDA H', '(434) 755-3428', 'palmer.wanda@rrjva.org', '2417'),
(206, '65', 'SERGEANT', 'MAYES, SKYLAR R', '(804) 721-2465', 'mayes.skylar@rrjva.org', '2034'),
(207, '66', 'SERGEANT', 'PRICE, JAMIE S', '(804) 536-2180', 'price.jamie@rrjva.org', '1735'),
(208, '67', 'SERGEANT', 'JOYNER, BRANDON L', '(804) 984-4649', 'joyner.brandon@rrjva.org', '1539'),
(209, '68', 'SERGEANT', 'GREGORY, TIMOTHY R', '(804) 712-8141', 'gregory.timothy@rrjva.org', '2043'),
(210, '69', 'SERGEANT', 'SCOTT, LATICA M', '(804) 605-4326', 'scott.latica@rrjva.org', '2493'),
(211, '7', 'CAPTAIN', 'BROWN, RAY A', '(804) 405-8245', 'rbrown@rrjva.org', '714'),
(212, '70', 'SERGEANT', 'HIGGINS, WENDY E', '(804) 731-3652', 'higgins.wendy@rrjva.org', '1903'),
(213, '71', 'SERGEANT', 'BROWN, SHANTA S', '(804) 728-5645', 'brown.shanta@rrjva.org', '1461'),
(214, '72', 'SERGEANT', 'STITH, JAMES A', '(804) 490-1486', 'stith.james@rrjva.org', '2312'),
(215, '74', 'SERGEANT', 'TAYLOR, THURMAN A', '(804) 490-8419', 'taylor.thurman@rrjva.org', '1666'),
(216, '77', 'SERGEANT', 'REID, KIYAMIEN K', '(804) 292-8890', 'reidkn@rrjva.org', '2654'),
(217, '8', 'CAPTAIN', 'MELLS, LATANYA T', '(804) 773-6159', 'mells.latanya@rrjva.org', '1019'),
(218, '80', 'ASST SUPERINTENDENT', 'HOLMES, DENNIS L', '(804) 574-4905', 'DHOLMES@RRJVA.ORG', '2911'),
(219, '81', 'SERGEANT', 'MCKELVIN, RAPHAEL O', '(973) 153-3856', 'mckelvin.raphael@rrjva.org', '2968'),
(220, '84', 'JAIL OFFICER', 'COLEMAN, ANTONIO L', '(804) 704-3239', 'coleman.antonio@rrjva.org', '1576'),
(221, '85', 'LIEUTENANT-OPERATION', 'FOTIAS, PRINCESS C', '(503) 593-2599', 'fotias.princess@rrjva.org', '1612'),
(222, '86', 'LIEUTENANT-OPERATION', 'BEASLEY, MONTRELL T', '(804) 605-2861', 'beasley.montrell@rrjva.org', '1909'),
(223, '87', 'JAIL OFFICER', 'BERRY, THOMAS W', '(804) 852-9877', 'berry.thomas@rrjva.org', '1442'),
(224, '9', 'CAPTAIN', 'JENKINS, DARYON L', '(804) 218-3852', 'jenkins.daryon@rrjva.org', '1467'),
(225, '90', 'JAIL OFFICER', 'JONES, ASHLEY D', '(804) 243-1212', 'williams.ashley@rrjva.org', '1512');

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

--
-- Dumping data for table `mailroom`
--

INSERT INTO `mailroom` (`id`, `inmate_number`, `first_name`, `last_name`) VALUES
(5, '73044', 'Marvin', 'Wilkins'),
(6, '', 'Enoch', 'Brown'),
(7, '', 'Marquis', 'Coleman Jr.'),
(8, '', 'Armani', 'Myrick'),
(9, '74877', 'Jerrell A', 'Crawley'),
(10, '81750', 'Mike', 'Stewart'),
(11, '82784', 'Joseph', 'Lopardo'),
(12, '', 'Bobby', 'Mills'),
(13, '', 'Crystal', 'LaRose'),
(14, '82178', 'Bradley', 'Bell'),
(15, '52193', 'Mikal', 'Lawton'),
(16, '49267', 'Tequan', 'Taylor'),
(17, '74080', 'Joshua', 'Cabaniss'),
(18, '77144', 'Jalen', 'Perez'),
(19, '80282', 'Jamari', 'Taylor'),
(20, '84816', 'Kristopher', 'Miller'),
(21, '83047', 'Kanequia', 'Walton'),
(22, '79382', 'Daryl', 'Willis'),
(23, '86712', 'Joshua', 'Harris'),
(24, '5011', 'Raymond', 'Tasco');

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

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `name`, `title`, `extension`, `section`) VALUES
(1, 'Mark McDaniel', 'Manager', '6003', 'Maintenance '),
(5, 'Neil Marlowe', 'Sgt.', '6024', 'MIU'),
(6, 'Tim Flexon', 'Chief', '6033', 'Maintenance '),
(7, 'Hartsell', 'Sgt.', '2063', 'Training'),
(8, 'C. Watson', 'Manager', '6048', 'Warehouse'),
(12, 'T. Mack', 'Acting Superintendent', '6603', 'Administration '),
(14, 'Admin', 'Asst.', '6028', 'Administration '),
(15, 'D. Holmes,', 'Asst. Supt.', '6403', 'Administration '),
(16, 'C. Armstrong', 'Asst. Supt.', '6631', 'Administration'),
(17, 'C. Reid', 'Director Admin Serv.', '6604', 'Administration '),
(18, 'M. Coleman', 'Asst. Director of Admin Servic', '6068', 'Administration '),
(19, 'V. Turner', 'Admin Asst.', '6026', 'Administration '),
(20, 'M. Montijo', 'Acct. Mgr', '6031', 'Admin Services '),
(21, 'A. Bowen', 'Acct Payable', '6023', 'Admin Services '),
(22, 'K. Strubel', 'Inmate Acct.', '6027', 'Admin Services '),
(23, 'T. Lewis-Jones', 'Purchasing Manager', '6030', 'Admin Services '),
(24, 'Vacant', 'Purch. Tech', '6022', 'Admin Services '),
(25, 'S. Ward', 'HR Mgr.', '6029', 'Admin Services '),
(26, 'L. Marlowe', 'HR Tech', '6025', 'Admin Services '),
(27, 'D. Jones', 'Receptionist', '6000', 'HR '),
(28, 'L. Reedy', '', '6226', 'Office Specialist'),
(29, 'B. Hudson', '', '6225', 'Office Specialist '),
(30, 'C.  Jones', 'LT.', '8438', 'OPR'),
(31, 'S. Brown', 'Sgt', '7884', 'OPR'),
(32, 'V. Spratley', 'Sgt.', '8461', 'OPR'),
(33, 'G. Coleman', 'Ofc.', '6622', 'OPR'),
(34, 'L. Feury', 'Supervisor', '3871', 'Maintenance '),
(36, 'S. Parham', '', '2064', 'Warehouse'),
(37, 'Vacant', 'Asst. Supt', '6724', 'Administration'),
(38, 'K. Peterson', 'Major', '6743', 'Majors '),
(39, 'Trisvan (Booking/Transportation)', 'LT', '6043', 'Support Services'),
(40, 'Transportation Office', '', '6046', 'Support Services'),
(41, 'Laundry', '', '2061', 'Support Services'),
(42, 'Landscape Shop', '', '2568', 'Support Services'),
(43, 'Master Control', '', '6601/6602', 'Support Services'),
(44, 'L. Jordan  (Lobby)', 'LT.', '6032/6020', 'Support Services'),
(45, 'Professional  Visitation', '', '2268', 'Support Services'),
(47, 'Movement Control', '', '2164/6051', 'Support Services'),
(48, 'Armory', '', '2057', 'Support Services'),
(49, 'M. Bush (Mail Room)', '', '2053', 'Support Services'),
(50, 'Barber  Shop', '', '6320', 'Support Services'),
(51, 'Vacant', '', '6038', 'Training'),
(52, 'Vacant', 'Ofc. Spec.', '6037', 'Training'),
(53, 'Administration', '', '524-6659', 'Faxes'),
(54, 'Booking', '', '524-6630', 'Faxes'),
(55, 'Canteen', '', '520-8456', 'Faxes'),
(56, 'Captains', '', '520-8435', 'Faxes'),
(57, 'Classification', '', '520-8436', 'Faxes'),
(58, 'OPR', '', '504-7883', 'Faxes'),
(59, 'Maintenance', '', '524-6637', 'Faxes'),
(60, 'Medical', '', '524-2678', 'Faxes'),
(61, 'Pre-Release', '', '524-7891', 'Faxes'),
(62, 'Records', '', '524-6643', 'Faxes'),
(63, 'Training', '', '524-8451', 'Faxes'),
(64, 'Video Arraingment', '', '524-6616', 'Faxes'),
(65, 'Warehouse', '', '524-6640', 'Faxes'),
(66, 'Work Release', '', '504-7885', 'Faxes'),
(67, 'O.Pitt', 'QMHP', '2232', 'QMHP'),
(68, 'R. Giles', 'HU1', '6102', 'Case Workers'),
(69, 'C. Stokes', 'HU2', '6204', 'Case Workers'),
(70, 'T. Savage', 'HU 3', '6304', 'Case Workers'),
(71, 'R. Weeks', 'HU 4   (M, W, F)', '6092', 'Case Workers'),
(73, 'PHONES', '', '1-877-650-4249', 'Global Tel Link'),
(74, 'CARE PACKAGE ', '', '1-800-546-6283', 'Sections'),
(75, 'ACCESS CORRECTIONS', '', '1-866-345-1884', 'Support Services'),
(76, 'Captain. L. Mason', ' Administrative Captain', '2681', 'Support Services'),
(78, 'Booking Intake Nurse', '', '2036/3302', 'Support Services'),
(79, 'Booking Intake', '', '6615/6623/2673/6632', 'Support Services'),
(80, 'Booking Release', '', '2679/6045', 'Support Services'),
(81, 'Property Officers', '', '6087/6045', 'Support Services'),
(82, 'D. Green', 'Records Manager ', '6617', 'Support Services'),
(83, 'Records Clerks', '', '6610/6041/6057', 'Programs'),
(84, 'Video Arraignment', '', '7898/7899', 'Support Services'),
(85, 'S. Crennell', 'LIDS', '2672', 'Support Services'),
(86, 'R. Nickelberry', 'LT.', '6229', 'Classification'),
(87, 'Crawley, J.', 'Classification Technician', '6235', 'Classifications'),
(88, 'J. Jones', '', '6236', 'Classification'),
(89, 'D. Walker', '', '6239', 'Classification'),
(90, 'S. Khan', '', '6244', 'Classification'),
(92, 'D. Williams', 'Sgt.', '6044', 'Inmate Discipline'),
(93, 'C. Marrow', 'Food Service', '6609', 'Community Detail/Hou'),
(94, 'Marlon', 'Officer', '6609', 'Community Detail/Hou'),
(95, 'E. Locust', 'Auditor Compliance', '6243', 'Compliance'),
(96, 'Sgt. N. Brewton', 'Standards Compliance', '6227', 'Compliance'),
(97, 'Williams', 'Sgt. ', '6208', 'Compliance'),
(98, 'Puryear', 'LT. ', '8437', 'Compliance'),
(99, 'B. Coleman', 'Grievance Programs', '2051', 'Programs'),
(100, 'S. Whitaker', 'Vol. Coord.', '6608', 'Programs'),
(101, 'Chaplain Blackwell', '', '6052', 'Programs'),
(102, 'Library Desk', '', '2044', 'Programs'),
(103, 'Testing Center', '', '6002', 'Programs'),
(104, 'Lead Teacher ', '', '2669', 'Programs'),
(105, 'S. Leabough', 'TC Mgr./Substance Abuse', '6228', 'Programs'),
(106, 'Plaskett S.', ' LEAD Worker/Counselor', '6701', 'Programs'),
(107, 'J. Hall,', 'QMHP', '8406', 'QMHP'),
(108, 'C. Green', 'TC Counselor', '6217', 'Programs'),
(109, 'K. Spangler', 'TC Counselor', '6223', 'Programs'),
(110, 'D. Jenkins', 'TC Counselor', '3875', 'Programs'),
(111, 'A. Munford', 'TC Aftercare', '8454', 'Programs'),
(112, 'Nathan Caldwell', '', '804-677-1549', 'Contractors'),
(113, 'Medical Housing 1', '', '2047', 'Medical Housing'),
(114, 'Medical Housing 2', '', '6220', 'Medical Housing'),
(115, 'Medical Housing Nurse', '', '2531', 'Medical Housing'),
(116, 'Juvenile Housing', '', '6230', 'Classification SHU –'),
(117, 'Classification SHU- A', '', '3303', 'Classification SHU –'),
(118, 'Classification SHU - B', '', '6241', 'Classification SHU –'),
(119, 'HU4 CLASSROOM #2', '', '2453', 'Housing Unit 4'),
(121, 'HU4 CLASSROOM #1', '', '2452', 'Housing Unit 4'),
(124, 'Housing Unit 4', 'Pod C', '2430', 'Housing Unit 4'),
(126, 'HU WC', 'Movement', '2164', 'Housing Watch Comman'),
(127, 'HU WC', 'Office', '6231', 'Housing Watch Comman'),
(128, 'Housing Unit 1', 'Unit Control', '6100', 'Housing Unit 1'),
(130, 'Culver', 'LT.', '6103', 'Housing Unit 1'),
(132, 'HU1 CLASSROOM #1', '', '2152', 'Housing Unit 1'),
(133, 'HU1 CLASSROOM #2', '', '2153', 'Housing Unit 1'),
(134, 'Housing Unit 2', 'Unit Control', '6200', 'Housing Unit 2'),
(135, 'P. Fotias (Office)', 'LT.', '6203', 'Housing Unit 2'),
(136, 'Housing Unit 2', '', '6206', 'Housing Unit 2'),
(138, 'Mental Health', '', '6205', 'Housing Unit 2'),
(139, 'HU2 CLASSROOM #1', '', '2253', 'Housing Unit 2'),
(140, 'HU2 CLASSROOM #2', '', '2221', 'Housing Unit 2'),
(142, 'L. Greenway ', 'LT. ', '6303', 'Housing Unit 3'),
(144, 'HU3 CLASSROOM #1', '', '2352', 'Housing Unit 3'),
(145, 'HU3 CLASSROOM #2', '', '2353', 'Housing Unit 3'),
(146, 'Housing Unit 6', '', '861-1190', 'Housing Unit 6'),
(147, 'Unknown', '', '6724', 'Housing Unit 6'),
(148, 'H. Massenburg ', '', 'LT.', 'Housing Unit 6'),
(149, 'Sergeant Office', '', '6066', 'Housing Unit 6'),
(150, 'C. Davis, W/E - O/S', '', '7888', 'Housing Unit 6'),
(151, 'R. Weeks', 'Case Worker, TU, THU', '6006', 'Case Workers (HU-4)'),
(152, 'Primary Control', '', '6712', 'Housing Unit 6'),
(153, 'Unit Control', '', '6726', 'Housing Unit 6'),
(154, 'Intake', '', '6727', 'Housing Unit 6'),
(155, 'A Unit', '', '6711', 'Housing Unit 6'),
(156, 'B Unit', '', '6720', 'Housing Unit 6'),
(157, 'Medical Clinic (HU6)', '', '6735', 'Housing Unit 6'),
(158, 'Classrooms', '', '6705/6009', 'Housing Unit 6'),
(159, 'LT.  J. Hobbs', '', '7890', 'Housing Unit 6'),
(160, 'Unknown', '', '7894', 'Housing Unit 6'),
(161, 'Jones', 'Ofc. ', '6725', 'Housing Unit 6'),
(162, 'N. Bonner (W/R)', 'Ofc.', '6007', 'Sections'),
(163, 'C. Perry (W/R)', 'Ofc. ', '6005', 'Housing Unit 6'),
(165, 'Unknown', '', '7886', 'Housing Unit 6'),
(166, 'Unknown', '', '6056', 'Housing Unit 6'),
(167, 'Toni Peyton ', '', '2043', 'Food Service (Aramar'),
(168, 'Kitchen Officer', '', '6004', 'Food Service (Aramar'),
(169, 'Staff Dining', '', '2050', 'Food Service (Aramar'),
(170, 'Thomas ', 'Admin Asst.', '6089', 'Medical (YESCARE)'),
(171, 'Moreno', 'Doctor', '6621/2022', 'Medical (YESCARE)'),
(172, 'DON- Lyons', '', '6607', 'Medical (YESCARE)'),
(173, 'H.S.A.  Boyd', '', '6055', 'Medical (YESCARE)'),
(174, 'A.H.S.A.  Hughes', '', '6626', 'Medical (YESCARE)'),
(175, 'NP Saunders', '', '6090/6088', 'Medical (YESCARE)'),
(176, 'MHD -  LeGrande', '', '6654', 'Medical (YESCARE)'),
(177, 'CQI  -  Lewis', '', '6083', 'Medical (YESCARE)'),
(178, 'Medical Records - Graves', '', '6039', 'Medical (YESCARE)'),
(179, 'Pharmacy - Johnson', '', '6106', 'Medical (YESCARE)'),
(180, 'Dental- Dr. Crawford', '', '6060', 'Medical (YESCARE)'),
(181, 'Clinic', '', '6606/6054/6067', 'Medical (YESCARE)'),
(182, 'L. Tysinger', 'Manager', '6049', 'Canteen (Keefe)'),
(183, 'Technicians', '', '2045', 'Canteen (Keefe)'),
(184, 'Training (Classroom)', '', '2059', 'Facility Phones'),
(185, 'Break Area', '', '2052', 'Facility Phones'),
(186, 'Roll Call ', '', '2058', 'Facility Phones'),
(187, 'Uniform Room', '', '6326', 'Facility Phones'),
(188, 'Staff Gym', '', '2028', 'Facility Phones'),
(189, 'Magistrate', '', '6611', 'Facility Phones'),
(219, 'Mark Tuggle', 'IT Technician', '6035', 'MIU'),
(259, 'Housing Unit 3', 'Unit Control', '6300', 'Housing Unit 3'),
(260, 'Housing Unit 4', 'Unit Control', '6400', 'Housing Unit 4'),
(261, 'Housing Unit 5', 'Unit Control', '6500', 'Housing Unit 5'),
(262, 'Housing Unit 1', 'Pod A', '2110', 'Housing Unit 1'),
(263, 'Housing Unit 1', 'Pod B', '2120', 'Housing Unit 1'),
(264, 'Housing Unit 1', 'Pod C', '2130', 'Housing Unit 1'),
(265, 'Housing Unit 1', 'Pod D', '2140', 'Housing Unit 1'),
(266, 'Housing Unit 1', 'Pod E', '2150', 'Housing Unit 1'),
(267, 'Housing Unit 2', 'Pod A', '2210', 'Housing Unit 2'),
(268, 'Housing Unit 2', 'Pod B', '2220', 'Housing Unit 2'),
(269, 'Housing Unit 2', 'Pod C', '2230', 'Housing Unit 2'),
(270, 'Housing Unit 2', 'Pod D', '2240', 'Housing Unit 2'),
(271, 'Housing Unit 2', 'Pod E', '2250', 'Housing Unit 2'),
(274, 'Housing Unit 3', 'Pod A', '2310', 'Housing Unit 3'),
(275, 'Housing Unit 3', 'Pod B', '2320', 'Housing Unit 3'),
(276, 'Housing Unit 3', 'Pod D', '2340', 'Housing Unit 3'),
(277, 'Housing Unit 3', 'Pod E', '2350', 'Housing Unit 3'),
(278, 'Housing Unit 4', 'Pod A', '2410', 'Housing Unit 4'),
(279, 'Housing Unit 4', 'Pod B', '2420', 'Housing Unit 4'),
(280, 'Housing Unit 4', 'Pod C', '2430', 'Housing Unit 4'),
(281, 'Housing Unit 4', 'Pod D', '2440', 'Housing Unit 4'),
(282, 'Housing Unit 4', 'Pod E', '2450', 'Housing Unit 4'),
(283, 'Housing Unit 5', 'Pod A', '2510', 'Housing Unit 5'),
(284, 'Housing Unit 5', 'Pod B', '2520', 'Housing Unit 5'),
(285, 'Housing Unit 5', 'Pod C', '2530', 'Housing Unit 5'),
(286, 'Housing Unit 5', 'Pod D', '2540', 'Housing Unit 5'),
(287, 'Housing Unit 5', 'Pod E', '2550', 'Housing Unit 5'),
(288, 'Housing Unit 3', 'Pod C', '2330', 'Housing Unit 3'),
(289, '', 'QMHP', '6105', 'Housing Unit 1'),
(290, '', 'QMHP', '6084', 'Housing Unit 4'),
(291, 'C. Jones', 'Ofc', '6008', 'Housing Unit 6'),
(292, 'QMHP', 'QMHP/Pysch', '6654', 'QMHP'),
(294, 'Lt. Whirley', 'Training Lt.', '6612', 'Training'),
(295, 'S. Underdue', 'QMHP Manager', '8458', 'QMHP'),
(296, 'Heather Scott', 'ICS Administrator', '6010', 'ICS'),
(297, 'Danny Hines', 'ICS Administrator', '6010', 'ICS'),
(298, 'Taylor Q.', 'Classification Technician', '6238', 'Classifications'),
(299, 'D. Manning', 'TC Counselor', '6218', 'Programs'),
(300, 'Long C.', 'LIDS Technician', 'Records', '2666');

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

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `last_name`, `first_name`, `group_name`, `address`, `city`, `state`, `zip`, `home_phone`, `cell_number`, `birthdate`, `date_hired`, `schedule`, `signature`, `church_locator`, `work_phone`, `experience_training`, `degree_type`, `email`, `race`, `sex`, `ssn`, `document_status`, `church_address`, `church_leader`, `church_phone`, `specific_skill_education`, `category_name`, `quarter_meeting_attended`, `vol_dinner_rsvp`, `dinner_guest`, `attended_quarterly_meeting`, `active_inactive_terminated`, `activity_status`, `ministry_group`, `chaplain_assistant`, `on_call_schedule`, `on_call_status`, `birth_month`, `minisitry_orientation`, `volume_manual_number`, `prea_training`, `main`, `hu6`, `denomination`, `devices_approved`, `termination_date`, `termination_reason`, `is_volunteer`) VALUES
(452, 'ABDULMUMIT', 'JIHAD', 'SERENITY Male & Female HIV Prevention', '9406 LOCKBERRY RIDGE LOOP', 'RICHMOND', 'VA', 23237, '(804) 304-8595', '', '0000-00-00', '0000-00-00', '3rd Mon 7:30pm-8:30pm', '', '', '', 'Certificate', '', '', 'Black', 'Female', '146-50-0091', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Serenity', '', '', 0, '0000-00-00', '0000-00-00', 195, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(453, 'AINSWORTH', 'SHIRLENE', 'MINISTRY-BIBLE STUDY', '618 OAKWOOD CIRCLE', 'PETERSBURG', 'VA', 23805, '(804) 861-0643', '(804) 721-1240', '0000-00-00', '0000-00-00', 'Mon 9:30am-HU1 A/B & Wed 1:00pm-2:30pm HU1CB; Sat 1:00-2:30pm HU6', '', 'Jehovahs Witnesses', '', 'Letter of Recommendation', '', 'n/a', 'Black', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'JEHOVAHS WITNESS', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', 'JEHOVAHS WITNESS', '', '0000-00-00', '', 1),
(454, 'ALFORD', 'LINWOOD', 'OPEN DOOR RESOURCE CENTER, INC', '4009 FITZHUGH AVENUE SUITE 203', 'RICHMOND', 'VA', 23230, '(804) 658-2784', '(804) 368-5327', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Degree', '', 'lalford@odrcinc', 'Black', 'Male', '228-08-2805', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', '', '', '', '0000-00-00', '', 1),
(455, 'ALLALA', 'LAURIE', 'NA MEETINGS', '10645 JOHNSON ROAD', 'SOUTH PRINCE GEORGE', 'VA', 23805, '(804) 586-6610', '', '0000-00-00', '0000-00-00', '1st or 3rd Wed 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'White', 'Female', '159-46-2368', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(456, 'BARTLAM', 'BRUCE', 'MINISTRY-COUNSELING', '5700 CLAYVILLE LANE', 'MOSELEY', 'VA', 23120, '(804) 739-2936', '(804) 931-4669', '0000-00-00', '0000-00-00', 'Varies', '', 'Bethel Baptist', '', '', '', '', 'White', 'Male', '227-46-0716', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'ON CALL CHAPLAIN', '', 'inactive until Dec Tuesday-Friday 0900-1400 hours', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'BAPTIST', '', '0000-00-00', '', 1),
(457, 'BATES', 'ERIC', 'AA MEETINGS', '2719 EXECTIVE DRIVE', 'CHESTER', 'VA', 23831, '(804) 943-4651', '', '0000-00-00', '0000-00-00', 'Tues 7:30pm-8:30pm', '', '', '', 'lLife Experiences', '', '', 'Black', 'Males', '049-64-7670', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(458, 'BIRDSELL', 'KEVIN', 'VETERAN JUSTICE OUTREACH SPECIALIST', '2310 COLTON DRIVE', 'NORTH CHESTERFIELD', 'VA', 23235, '(804) 675-5000', '(804) 675-5000', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Federal Government ID', '', 'kevin.birdsell@va.gov', 'White', 'Male', '218-17-8316', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'Active', '', '', '', '', 0, '0000-00-00', '0000-00-00', 217, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(459, 'BLYDEN', 'PAUL', 'MINISTRY-SUNDAY SERVICE', '6032 CHINQUAPIN CIRCLE', 'PRINCE GEORGE', 'VA', 23875, '(678) 973-3978', '', '0000-00-00', '0000-00-00', 'Sun 7:30-9:00pm Week 3 HU5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(460, 'BOGESE', 'DEBORAH', 'MINISTRY-ADMINISTRATIVE', '8539 COUNTRY VIEW', 'NORTH PRINCE GEORGE', 'VA', 23860, '', '(804) 731-2523', '0000-00-00', '0000-00-00', 'Mon 8:00am-12:00pm', '', '', '', '', '', 'DSBOGESE@COMCAST.NET', 'White', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ADMINISTRATIVE', 'GOOD NEWS LESSONS', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(461, 'BONNER', 'RHACQUEL', 'INTERN/CASE MANAGER', '345 BUCKLAND HILLS DRIVE APT#7223', 'MANCHESTER', 'CT', 6042, '(959) 200-0920', '(959) 200-0920', '0000-00-00', '0000-00-00', 'Tuesday & Thursday 8:00am-4:30pm', '', '', '', 'MOU', '', 'RHACQUELB', 'Black', 'Female', '049-04-3201', '', '', '', '', '', 'INTERN', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(462, 'BUFORD', 'DEBORAH', 'MENTAL HEALTH OUTREACH RIVER CIITY', '1144 W. NORMANDALE AVENUE', 'PETERSBURG', 'VA', 23803, '(804) 943-5504', '', '0000-00-00', '0000-00-00', 'Varies Male & female', '', '', '', 'Degree', '', 'dbuford@riercityccs.com', 'Black', 'Female', '228-68-1919', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(463, 'BURROW', 'JOHNNIE', 'AA MEETINGS', '640-D JUNIPER ROAD', 'PETERSBURG', 'VA', 23803, '(804) 712-0699', '', '0000-00-00', '0000-00-00', 'Fri 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '225-76-0845', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(464, 'CANADAY', 'MELISSA', 'FOCUSED OUTREACH RICHMOND', '6325 OLIVET CHURCH ROAD', 'PROVIDENCE FORGE', 'VA', 23140, '(804) 586-6412', '(804) 586-6412', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Degree', '', 'mcanaday@focusedoutreachrichmond.org', 'American Indian', 'Female', '213-92-6161', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'Active', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(465, 'CEASER', 'TERRI', 'UNHEALTHY RELATIONSHIP', '156 SEYLER DRIVE', 'PETERSBURG', 'VA', 23805, '(804) 734-6378', '(804) 721-0610', '0000-00-00', '0000-00-00', '4th Wed 7:30pm-8:30pm', '', '', '', 'Degree', '', '', 'Black', 'females', '226-98-1505', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(466, 'CHILES, SR.', 'DOUGLAS', 'MINISTRY-BIBLE STUDY/SUNDAY SERVICE/TRAUMA HEALING', '15518 CHESDIN LANDING COURT', 'CHESTERFIELD', 'VA', 23838, '(804) 590-1480', '(706) 471-0003', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', 'chilesd55@gmail.com', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Anytime after 1200 hours', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(467, 'CLAIBORN', 'CORETHA', 'ALAMO RECOVERY CENTER/ANGER MANAGEMENT GROUP', '7053 OMALLEY DRIVE', 'NORTH CHESTERFIELD', 'VA', 23234, '(804) 651-0876', '', '0000-00-00', '0000-00-00', '3rd Fri 9:00am-11:30am', '', '', '', 'Degree', '', '', 'Black', 'Female', '224-17-2406', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(468, 'CLAYBORNE', 'JANE', 'THE JAMES HOUSE', '1716 S. SYCAMORE STREET', 'PETERSBURG', 'VA', 23805, '(804) 299-1414', '', '0000-00-00', '0000-00-00', 'Mon 9:00am-12:00pm & Thur 9:00am-10:00am', '', '', '(804) 458- 2704', 'Letter of Recommendation', '', '', 'White', 'Female', '398-54-2719', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'James House', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(469, 'COLE, JR.', 'ARTHUR', 'MINISTRY-SUNDAY SERVICE', '2104 HARVEST GROVE LANE', 'RICHMOND', 'VA', 23223, '(804) 691-3934', '(804) 279-5811', '0000-00-00', '0000-00-00', 'Sun 9:30-10:45am Week 2 HU2A', '', '', '', '', '', '', 'Black', 'Male', '227-62-8760', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(470, 'CROUCHE', 'LATISHIA', 'DISTRICT 19', '20 W BANK STREET SUITE # 4', 'PETERSBURG', 'VA', 23803, '', '(804) 704-1830', '0000-00-00', '0000-00-00', 'Tues & Thurs 9:30am-11:00am', '', '', '', 'Certificate', '', 'icrouche@19csb.com', 'Black', 'Female', '185-56-6914', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'Active', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(471, 'CRUZ-LOPEZ', 'HECTOR', 'MINISTRY-SPANISH BIBLE STUDY', '40 GREENWELL DRIVE', 'HAMPTON', 'VA', 23666, '(757) 344-0091', '', '0000-00-00', '0000-00-00', 'Tue Week 2 & 5', '', '', '', '', '', '', 'Hispanic', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '7th DAY ADVENTIST', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '7TH DAY ADVENTIST', '', '0000-00-00', '', 1),
(472, 'CUNNINGHAM', 'CLINTON', 'MINISTRY-BIBLE STUDY', '2709 PORTSMOUTH STREET', 'HOPEWELL', 'VA', 23860, '(804) 452-2380', '', '0000-00-00', '0000-00-00', 'Thu 9:00-10:30am Week 2/4 HU2B', '', 'West Hopewell Presbyterian', '', '', '', '', 'White', 'Male', '083-26-8386', '', '2602 Wise Street, Hopewell, VA 23860', 'Pastor John Lindsay', '(804) 458-4008', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'PRESBYTERIAN', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'PRESBYTERIAN', '', '0000-00-00', '', 1),
(473, 'CUNNINGHAM', 'LINDA SUE', 'MINISTRY-BIBLE STUDY', '2709 PORTSMOUTH STREET', 'HOPEWELL', 'VA', 23860, '(804) 452-2380', '(757) 605-5801', '0000-00-00', '0000-00-00', 'Thu 9:00-10:30am Week 2/4 HU1A', '', 'West Hopewell Presbyterian', '', '', '', 'lindadizyb@comcast.net', 'White', 'Female', '420-70-3868', '', '2602 Wise Street, Hopewell, VA 23860', 'Pastor John Lindsay', '(804) 458-4008', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'PRESBYTERIAN', 'ON CALL', 'Thursday (2nd & 4th) 0900-1030 hours', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'PRESBYTERIAN', '', '0000-00-00', '', 1),
(474, 'DARRINGTON', 'HAILEY', 'INTERN/ CASE MANAGER', '7248 STATEMAN BLVD', 'RUTNER GLEN', 'VA', 22546, '', '(804) 982-6882', '0000-00-00', '0000-00-00', 'Tuesday & Thursday 8:00am-4:30pm', '', '', '', 'MOU', '', 'hdar9699@students.vsu.edu', 'Black/White', 'Female', '225-97-0132', '', '', '', '', '', 'INTERN', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(475, 'DAVID', 'CHRIS', 'MINISTRY-BIBLE STUDY', '111 NOTTINGHAM DRIVE', 'COLONIAL HEIGHTS', 'VA', 23831, '(804) 943-1046', '', '0000-00-00', '0000-00-00', 'Tue 7:30-9:00pm HU5', '', '', '', '', '', '', '', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(476, 'DAVIS', 'THOMAS', 'MINISTRY-SUNDAY SERVICE', '20901 TRUTH DRIVE', 'ETTRICK', 'VA', 23803, '(804) 520-2599', '(804) 520-2599', '0000-00-00', '0000-00-00', 'Sun 9:30-10:45am Week 2 HU2A', '', '', '', '', '', '', 'Black', 'Male', '229-50-4156', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(477, 'DEAN-FORD', 'FRANCINE', 'NA MEETINGS', '346 RED OAK DRIVE', 'HOPEWELL', 'VA', 23860, '(804) 479-9692', '', '0000-00-00', '0000-00-00', '1st or 3rd Wed 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Female', '230-04-8498', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(478, 'DEMBY', 'JOE', 'MINISTRY-SUNDAY SERVICE/TRAUMA HEALING', '5550 VARGO LANE', 'PRINCE GEORGE', 'VA', 23875, '(804) 541-7133', '(804) 586-1698', '0000-00-00', '0000-00-00', 'Sun 2:00-3:45pm Week 1 &4; Week Days 6:00-8:00pm Week 3', '', '', '', '', '', '', 'White', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(479, 'DOOLEY', 'DOROTHY', 'MINISTRY-SUNDAY SERVICE', '6848 HEARTHSIDE DRIVE', 'PRINCE GEORGE', 'VA', 23875, '(804) 586-0731', '', '0000-00-00', '0000-00-00', 'Sun 8:00-9:15am Week 4 HU1A', '', '', '', '', '', '', '', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(480, 'DUMOND', 'MARTIN', 'MINISTRY', '6433 SAWMILL ROAD', 'PRINCE GEORGE', 'VA', 23875, '(786) 303-3848', '(573) 528-8719', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', '', 'Hispanic', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(481, 'EVANS', 'KELLY', 'REENTRY JOB FOR LIFE', '219 E. BANK STREET APT # 136', 'PETERSBURG', 'VA', 23803, '(804) 982-0671', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', 'plannerevent@yahoo.com', 'Black', 'Female', '228-27-7021', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(482, 'FARKAS', 'GERALDINE (GERRIE)', 'MINISTRY-BIBLE STUDY/TRAUMA HEALING GROUP', '4826 TATUM ROAD', 'DISPUTANTA', 'VA', 23842, '(804) 892-2625', '(804) 887-0627', '0000-00-00', '0000-00-00', 'Wed 9:00-11:00am HU1', '', '', '', '', '', 'redhead254@juno.com', 'White', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(483, 'FIGGS', 'JAMINE', 'MINISTRY-BIBLE STUDY', '12619 CHESTER GROVE CIRCLE', 'CHESTER', 'VA', 23831, '(804) 304-7930', '', '0000-00-00', '0000-00-00', 'Wed  (2nd & 4th) 7:30-8:30pm HU2', '', 'Christian Life Center', '', '', '', 'jamine.figgs@christianlife.org', 'Black', 'Male', '559-91-5132', '', '', 'Denise Lechaney', '(804)748-2224', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Non-denominational', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Nondenominational', '', '0000-00-00', '', 1),
(484, 'FLOWERS', 'MATTHEW', 'NA MEETINGS', '1113 PIERCE STREET', 'HOPEWELL', 'VA', 23860, '(804) 943-7270', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed or 2nd & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '225-76-1846', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(485, 'FLOYD II', 'ALWYN', 'MINISTRY-BIBLE STUDY', 'P. O. BOX 622', 'DINWIDDIE', 'VA', 23841, '(804) 469-4262', '(804) 469-4262', '0000-00-00', '0000-00-00', 'Mon 7:00-9:00pm HU5', '', 'Covenant Bible Fellowship', '', '', '', 'alwynfloyd@gmail.com', 'White', 'Male', '231-23-7893', '', '', 'Chuck Clawson`', '(804)731-2224', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Christian', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Christian', '', '0000-00-00', '', 1),
(486, 'FREDMONSKY', 'GREG', 'MINISTRY-BIBLE STUDY', '4740 COCHISE TRAIL', 'NORTH CHESTERFIELD', 'VA', 23237, '(912) 980-4742', '(912) 980-4742', '0000-00-00', '0000-00-00', 'Wed 7:30-9:00pm HU2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(487, 'FREEMAN', 'DUANE', 'MINISTRY-SUNDAY SERVICE/ADMINISTRATIVE', '5620 WEST CREEK ROAD', 'AMELIA', 'VA', 23002, '(804) 477-4668', '', '0000-00-00', '0000-00-00', 'Sun 9:30-10:45am (1st & 5th)-HU2A; Wed 8:00am-2:00pm', '', 'Hope Chapel Four Square', '', '', '', 'duanefreeman52@yahoo.com', 'White', 'Male', '229-86-0050', '', '', 'Dave Muckel', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ADMINISTRATIVE', 'BIBLE DISTRIBUTION', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(488, 'FULLER', 'GREGORY', 'NA MEETINGS', '13514 SOUTH CRATER ROAD', 'PETERSBURG', 'VA', 23805, '(804) 895-4850', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed 7:30-8:30pm', '', 'n/a', '(804) 798- 2470', 'Life Experiences', '', '', 'White', 'Male', '228-17-8190', '2ND ID', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 23, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(489, 'GALLEMORE', 'SHAKIMA', 'REENTRY GROUP FACILITATOR', '3905 LONDON ROAD', 'HOPEWELL', 'VA', 23860, '(804) 943-3702', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Degree', '', 'shakimag@yahoo.com6', 'Black', 'Female', '150-90-0062', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(490, 'GARNER', 'YAHSHEEN', 'NA MEETINGS', '719 E WYTHE STREET', 'PETERSBURG', 'VA', 23803, '(908) 247-7801', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed or  2nd & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Female', '156-68-8811', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(491, 'GARNER', 'RONNIE', 'NA MEETINGS', '719 E. WYTHE STREET', 'PETERSBURG', 'VA', 23803, '(908) 247-8561', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed or 2nd  & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '141-62-6436', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(492, 'GATTTIS', 'ALAN', 'MINISTRY-COUNSELING', '300 RIDGE ROAD', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 712-1707', '', '0000-00-00', '0000-00-00', 'Tue 7:30-9:30pm', '', 'Matoaca Christian Fellowship', '', '', '', 'res1e2ws@verizon.net', 'White', 'Male', '225-86-7387', '', '7700 River Road, Matoaca, VA 23803', 'Ryan B. Atchison', '(804) 590-2375', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Christian', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Christian', '', '0000-00-00', '', 1),
(493, 'GIBSON', 'BETSY', 'AA MEETINGS', '16030 SEARCHLIGHT COURT', 'CHESTER', 'VA', 23831, '(804) 479-2048', '', '0000-00-00', '0000-00-00', '2nd & 4th Mon 8:00pm-9:00pm', '', '', '', 'Life Experiences', '', '', 'White', 'Female', '225-19-0223', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(494, 'GREEN', 'CAROL', 'MINISTRY-BIBLE STUDY', '1 SURRY LANE', 'PETERSBURG', 'VA', 23803, '(804) 709-2775', '(646) 709-2775', '0000-00-00', '0000-00-00', 'Wed 9:00am-3:00pm', '', 'Mt. Pleasant Baptist', '', 'Letter of Recommendation', '', 'cgreen1839@gmail.com', 'Black', 'Female', '129-46-7729', 'commitment agreement, do and don’t, credentials, dob, doh, church information, race, gender, ssn', '', 'Dr. Joey Anthony', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'Active', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'BAPTIST', '', '0000-00-00', '', 1),
(495, 'HALL', 'EMILY', 'DISTRICT 19', '23923 RIVER ROAD', 'NORTH DINWIDDIE', 'VA', 23803, '', '(804) 720-5292', '0000-00-00', '0000-00-00', 'Tues & Thurs 9:30am-11:00am', '', '', '', 'Degree', '', 'ehall@d19csb.com', 'Black', 'Female', '225-08-4377', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(496, 'HAMILTON', 'MATTHEW', 'MINISTRY-BIBLE STUDY/SUNDAY SERVICE', '14200 PHYSIC HILL ROAD', 'CHESTERFIELD', 'VA', 23838, '(804) 739-1991', '(804) 739-1096', '0000-00-00', '0000-00-00', 'Fri 9:00-10:30am/Sun 9:30-11:00am HU6 Males', '', 'Manchester Baptist', '', 'Letter of Recommendation', '', 'newdawnproperty@verizon.net', 'White', 'Male', '224-78-7768', 'credentials, dob, doh, church information, race, gender, ssn', '9515 Winterpock Road, Chesterfield, VA 23832', 'Wayne Porter', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'BAPTIST', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', 'BAPTIST', '', '0000-00-00', '', 1),
(497, 'HAMILTON', 'TAMMY', 'MINISTRY-BIBLE STUDY/SUNDAY SERVICE', '14200 PHYSIC HILL ROAD', 'CHESTERFIELD', 'VA', 23838, '(804) 739-1991', '', '0000-00-00', '0000-00-00', 'Sun 9:35-11:00am HU6 Females', '', 'Manchester Baptist', '', 'Letter of Recommendation', '', 'n/a', 'White', 'Female', '231-78-8540', 'credentials, dob, doh, church information, race, gender, ssn', '9515 Winterpock Road, Chesterfield, VA 23832', 'Wayne Porter', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(498, 'HARRELL', 'KIM', 'MINISTRY-SUNDAY SERVICE', '3785 IMPALA DRIVE', 'PRINCE GEORGE', 'VA', 23875, '(804) 721-7400', '(804) 721-7400', '0000-00-00', '0000-00-00', '4th Sun 2:00-3:45pm HU1B', '', '', '', '', '', '', 'Black', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(499, 'HARRELL', 'THOMAS', 'MINISTRY-SUNDAY SERVICE', '3785 IMPALA DRIVE', 'PRINCE GEORGE', 'VA', 23875, '(804) 721-7457', '(804) 721-7457', '0000-00-00', '0000-00-00', '1st Sun 7:30-9:00pm HU4', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(500, 'HARRISON', 'JEROME', 'MINISTRY-BIBLE STUDY', '772 KIRKHAM STREET', 'PETERSBURG', 'VA', 23803, '(804) 732-3556', '(804) 712-9264', '0000-00-00', '0000-00-00', 'Tue 9:45am HU2; Wed 10:00am HU3; Thu 10:00am HU5', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'JEHOVAHS WITNESS', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'JEHOVAH WITNESS', '', '0000-00-00', '', 1),
(501, 'HAYDEN', 'ANDREA', 'MINISTRY-SUNDAY SERVICE', '300 HODDER LANE', 'HIGHLAND SPRINGS', 'VA', 23075, '(804) 337-2660', '', '0000-00-00', '0000-00-00', '1st Sun 8:00-9:15am HU1A; 9:30-10:45am HU1CB/MH Females', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(502, 'HENDERSON', 'MARCUS', 'RE-ENTRY WORKFORCE', '509 HULL STREET', 'RICHMOND', 'VA', 23224, '', '(804) 490-2849', '0000-00-00', '0000-00-00', 'Wed 9:00am-3:00pm', '', '', '', 'MOU', '', 'min2044@gmail.com', 'Black', 'Male', '229-65-5091', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', '', '', '', '0000-00-00', '', 1),
(503, 'HENNINGHAN', 'LUTHER', 'MINISTRY-BIBLE STUDY/TRAUMA HEALING', '600 COWARDIN AVENUE, APT. 213', 'RICHMOND', 'VA', 23224, '(704) 674-5344', '', '0000-00-00', '0000-00-00', 'Tue pm-HU5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(504, 'HIGGANS', 'FELICIA', 'MINISTRY-BIBLE STUDY', 'P.O. BOX 151', 'HENRICO', 'VA', 23075, '(804) 402-4249', '(804) 402-4249', '0000-00-00', '0000-00-00', 'Thu pm-7:30-9:00pm HU1CB/MH Females', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'SWAT', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(505, 'HIGGS', 'RODNEY', 'MINISTRY-SUNDAY SERVICE', '5494 MUZZLE COURT', 'MECHANICSVILLE', 'VA', 23111, '(757) 681-2576', '(804) 803-0378', '0000-00-00', '0000-00-00', 'Sun (2nd/5th) 8:00-9:15am HU3A/C/D; 9:30-10:45am HU3B/E/1CC/MH Men; 7:30-9:00pm HU5', '', 'Richmond Christian Center', '', '', '', '', 'Black', 'Male', '226-21-6039', '', '214 Cowardin Avenue, Richmond, VA', 'Steve Parson, Sr.', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Christian', '', '0000-00-00', '', 1),
(506, 'HILL', 'TERRY', 'MINISTRY-SUNDAY SERVICE', '280 OAKWOOD DRIVE', 'SURRY', 'VA', 23883, '(757) 294-3133', '', '0000-00-00', '0000-00-00', '3rd Sun 8:00-9:15am HU3A, C, D', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(507, 'HINES II', 'AUTIE', 'RE-ENTRY WORKFORCE', '7909 SOUTHFORD TERRANCE', 'CHESTERFIELD', 'VA', 23832, '', '(804) 822-7855', '0000-00-00', '0000-00-00', 'Wed 9:00am-3:00pm', '', '', '', 'MOU', '', 'ahines@mcmserves.org', 'Black', 'Male', '563-33-1052', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(508, 'HOLMES', 'WILLIAM', 'MINISTRY-SUNDAY SERVICE', '8100 COUNTRYSIDE CROSSINGS COURT', 'RICHMOND', 'VA', 23231, '(804) 507-0517', '(804) 389-1978', '0000-00-00', '0000-00-00', 'Alternate', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(509, 'HUCKS', 'STAFFORD', 'NA MEETINGS', '128 S SYCAMORE STREET', 'PETERSBURG', 'VA', 23803, '(804) 895-5837', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed or 2nd & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '579-86-7630', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(510, 'HUMPHRIES', 'PENNY', 'MINISTRY-SUNDAY SERVICE', '9903 RIVER ROAD', 'SOUTH CHESTERFIELD', 'VA', 23803, '(804) 691-1324', '', '0000-00-00', '0000-00-00', '3rd Sun 2:00-3:45pm HU1B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(511, 'JACKSON', 'LORENZO', 'ALAMO RECOVERY CENTER/ AA MEETINGS/ANGER MANAGEMENT GROUP', '35 SOUTH MARKET STREET', 'PETERSBURG', 'VA', 23803, '(804) 479-2342', '', '0000-00-00', '0000-00-00', '3rd Fri 9:00am-11:30am/Fri 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '228-06-4047', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(512, 'JACKSON', 'ELIZABETH', 'MINISTRY-SUNDAY SERVICE', '500 GLENMEADOW TERRACE', 'MIDLOTHIAN', 'VA', 23114, '(804) 794-8213', '(804) 551-1611', '0000-00-00', '0000-00-00', '4th Sun 9:30-10:45am HU1CB & MH females', '', 'Abundant Life Church of Christ', '', '', '', 'einnabj@gmail.com', 'Black', 'Female', '010-40-2774', '', '3300 Neale Street, Mechanicsville, VA', 'Steve Foreman', '(804) 794-8213', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(513, 'JACKSON', 'SOLLY', 'MINISTRY-SUNDAY SERVICE', '500 GLENMEADOW TERRACE', 'MIDLOTHIAN', 'VA', 23114, '(804) 382-5144', '(804) 382-5144', '0000-00-00', '0000-00-00', '4TH SUN 9:30-10:45AM HU2A', '', 'Abundant Life Church of Christ', '', '', '', 'sollyvj1@gmail.com', 'Black', 'Male', '224-64-5381', '', '3300 Neale Street, Mechanicsville, VA', 'Steve Foreman', '(804) 794-8213', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Christian', '', '0000-00-00', '', 1),
(514, 'JACKSON JR.', 'BENJAMIN', 'MINISTRY-SUNDAY SERVICE', '5501 DUNROMING COURT', 'CHESTERFIELD', 'VA', 23832, '(804) 349-8024', '', '0000-00-00', '0000-00-00', 'Sun 8:00-9:15am HU2D & E', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(515, 'JANG', 'SUNG JOON', 'MINISTRY-RESEARCH TRAUMA HEALING', '6504 COSTA DRIVE', 'WACO', 'TX', 76712, '(225) 603-9910', '(225) 603-9910', '0000-00-00', '0000-00-00', 'AS REQUESTED', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'BAYLOR UNIVERSITY/AMERICAN BIBLE SOCIETY', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(516, 'JARMON', 'NYLES', 'MINISTRY-SUNDAY SERVICE', '20306 STONEWOOD MANOR DRIVE', 'SOUTH CHESTERFIELD', 'VA', 23803, '(804) 479-2162', '(804) 720-3404', '0000-00-00', '0000-00-00', 'SUN 7:30-9:00pm HU2B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(517, 'JEFFERSON', 'ALBERTA', 'MINISTRY-SUNDAY SERVICE', '6416 OMO ROAD', 'NORTH CHESTERFIELD', 'VA', 23234, '(804) 303-3045', '', '0000-00-00', '0000-00-00', '2ND SUN 8:00-9:15AM HU1A; 9:30-10:45AM HU1CB/MH FEMALES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(518, 'JEFFERSON JR.', 'THOMAS', 'MINISTRY-SUNDAY SERVICE', '6416 OMO ROAD', 'NORTH CHESTERFIELD', 'VA', 23234, '(804) 303-3045', '(804) 663-8085', '0000-00-00', '0000-00-00', '2ND SUN 8:00-9:15AM HU1A; 9:30-10:45AM HU1CB/MH FEMALES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(519, 'JENNINGS-COOPER', 'RENEE', 'DISTRICT 19', '11428 CEDAR RUN ROAD', 'SOUTH PRINCE GEORGE', 'VA', 23805, '', '(804) 895-5907', '2024-06-21', '2024-06-22', 'Tues & Thurs 9:30am-11:00am', '', '', '', 'Degree', '', 'Rjennings-cooper@d19csb.com', 'Black', 'Female', '224-04-2310', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'inactive_covid', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(520, 'JOHNSON', 'BYRON', 'MINISTRY-RESEARCH TRAUMA HEALING', '107 BRADFORD SQUARE', 'WOODWAS', 'TX', 76712, '(254) 710-7555', '(254) 716-0880', '0000-00-00', '0000-00-00', 'AS REQUESTED', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'BAYLOR UNIVERSITY/AMERICAN BIBLE SOCIETY', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(521, 'JONES', 'KEITH', 'MINISTRY-SPIRITUAL COUNSELOR', '25905 WEAKLEY ROAD', 'NORTH DINWIDDIE', 'VA', 23803, '(804) 721-6466', '(804) 721-6466', '0000-00-00', '0000-00-00', 'Mon & Wed 8:00am - 4:30pm', '', 'NOW FAITH THAT WORKS', '', 'License', 'LICENSE', '', 'Black', 'Male', '229-02-0616', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'Active', '', '', 'ON CALL', 'Monday & Wednesday', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(522, 'JORDAN', 'CHANIE', 'PARENTING CLASS', '9137 COOL AUTUMN DRIVE', 'MECHANICSVILLE', 'VA', 23116, '(804) 393-0110', '', '0000-00-00', '0000-00-00', '2nd Sat 2:00pm-4:00pm', '', '', '', 'Degree', '', '', 'Black', 'Female', '225-86-3011', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(523, 'JORDAN', 'FRANKIE', 'REENTRY REGENSIS HOUSING', '115 NORTH MARKET STREET', 'PETERSBURG', 'VA', 23803, '(804) 481-0266', '', '0000-00-00', '0000-00-00', 'Mon-Fri 9:00am-11:00am', '', '', '', 'Certificate', '', '', 'Black', 'Male', '230-94-0933', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(524, 'KENISTON-POND', 'KYMBERLY', 'MINISTRY-BIBLE STUDY', '18611 ROLLINGSIDE DRIVE', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 931-6688', '', '0000-00-00', '0000-00-00', 'MON 9:00-10:00AM HU1A,B; WED 2:00-3:00PM HU1CB; Sat 1:00-2:30pm HU6', '', '', '', 'Letter of Recommendation', '', '', 'White', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'JEHOVAHS WITNESS', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', 'JEHOVAH WITNESS', '', '0000-00-00', '', 1),
(525, 'KINDRED', 'ALFRED', 'MINISTRY-SUNDAY SERVICE', '561 COLLEGE RUN DRIVE', 'SURRY', 'VA', 23883, '(757) 593-8561', '', '0000-00-00', '0000-00-00', '3RD SUN 8:00-9:15AM HU3A, C, D', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(526, 'KING', 'DARNELLA', 'DISTRICT 19', '13 CEDARCROFT COURT', 'PETERSBURG', 'VA', 23805, '(804) 299-1798', '(804) 299-1798', '0000-00-00', '0000-00-00', 'Tues & Thurs 9:30am-11:00am', '', '', '', 'Life Experiences', '', 'darnellabillups@gmail.com', 'Black', 'Male', '227-25-0182', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', '', '', '', '0000-00-00', '', 1),
(527, 'LASKOWSKI', 'CATHERINE', 'MINISTRY-CATHOLIC STUDY', '5323 THORNINGTON DRIVE', 'NORTH CHESTERFIELD', 'VA', 23237, '(804) 748-0527', '', '0000-00-00', '0000-00-00', 'SAT 08:15-9:15AM HU1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'CATHOLIC', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'CATHOLIC', '', '0000-00-00', '', 1),
(528, 'LEWIS', 'GREGORY', 'MINISTRY-BIBLE STUDY', '8319 HOPKINS ROAD', 'NORTH CHESTERFIELD', 'VA', 23237, '(804) 271-8219', '(804) 241-2153', '0000-00-00', '0000-00-00', 'WED 9:00-10:00AM HU3', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'CHURCH OF CHRIST', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'CHRISTIAN-COC', '', '0000-00-00', '', 1),
(529, 'LIGHT', 'BARRY', 'MINISTRY-COUNSELING', '14649 WINDJAMMER DRIVE', 'MIDLOTHIAN', 'VA', 23112, '(804) 641-6467', '', '0000-00-00', '0000-00-00', 'SAT 9:00-11:00AM HU3C, D, E', '', '', '', '', '', '', 'White', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(530, 'MASON', 'DARRELL', 'NA MEETINGS', '301 N. DUNLOP STREET', 'PETERSBURG', 'VA', 23803, '(804) 255-5330', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed or 2nd & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '226-90-3812', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(531, 'MATTHEWS', 'SYLVIA', 'MINSTRY-BIBLE STUDY/TRAUMA HEALING GROUP', '1806 ARCH STREET', 'PETERSBURG', 'VA', 23805, '(804) 861-2601', '(804) 691-0710', '0000-00-00', '0000-00-00', 'TUE 9:00-11:00AM HU1A; FRI 9-11AM 1B; SUN-SAT 6-8PM 2ND WEEK', '', 'Monumental Baptist', '', '', '', 'CPTCLWN@AOL.COM', 'White', 'Female', '225-50-3513', '', '2925 South Crater Road, Petersburg, VA 23805', 'Dr. Barry Ginn', '(804) 733-8484', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Monday -Saturday anytime; Sundays after 1430 hours', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(532, 'MCDUFF', 'JOHN', 'AA MEETINGS', '12533 RICHMOND STREET', 'CHESTER', 'VA', 23831, '(757) 560-0942', '', '0000-00-00', '0000-00-00', '2nd & 4th Wed 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'White', 'Male', '587-06-2958', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(533, 'MCGUIRE', 'GRIFFIN', 'MINISTRY-SUNDAY SERVICE', '11430 SMOKETREE DRIVE', 'RICHMOND', 'VA', 23236, '(804) 379-3202', '(804) 305-0163', '0000-00-00', '0000-00-00', '', '', 'Mount Herman Baptist', '', 'License', '', 'griffin.mcguire@cc.virginia.gov', '', 'Male', '350-52-6005', '', 'Moseley, VA', 'Lee Ellison', '(804) 921-6010', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Friday after 1330 hrs; Saturday anytime; Sunday after 1300 hrs', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(534, 'MCMILLAN', 'MONICA', 'RE-ENTRY WORKFORCE', '329 FRESH MEADOWS ROAD', 'LAWRENCEVILLE', 'VA', 23868, '', '(717) 557-4039', '0000-00-00', '0000-00-00', 'Wed 9:00am-3:00pm', '', '', '', 'MOU', '', 'mmcmillan@mcmserves.org', 'Black', 'Female', '227-45-1065', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(535, 'MCREYNOLDS', 'TRACEY', 'REENTRY REGENESIS HOUSING', '1578 BRANDON AVENUE', 'PETERSBURG', 'VA', 23805, '(804) 712-7620', '', '0000-00-00', '0000-00-00', 'Mon-Fri 9:00am-11:00am', '', '', '', 'License', '', '', 'White', 'Female', '397-86-5741', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(536, 'MCREYNOLDS', 'GARY', 'REENTRY REGENESIS HOUSING', '1578 BRANDON AVENUE', 'PETERSBURG', 'VA', 23805, '(804) 720-5473', '', '0000-00-00', '0000-00-00', 'Mon-Fri 9:00am-11:00am', '', '', '', 'License', '', '', 'White', 'Male', '232-17-9152', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(537, 'MERRIWEATHER', 'ANTHONY', 'MINISTRY-SUNDAY SERVICE', '3234 GARRETT STREET', 'RICHMOND', 'VA', 23221, '(804) 712-5431', '(804) 359-0554', '0000-00-00', '0000-00-00', '2ND SUN 9:30-10:45AM HU2A', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(538, 'MICHAELIS', 'SCOTT', 'MINISTRY-TRAUMA HEALING/COUNSELING', '4930 COOL SPRING DRIVE', 'CHESTER', 'VA', 23831, '(804) 339-0346', '', '0000-00-00', '0000-00-00', 'Varies', '', 'Colonial Baptist Church', '', '', '', 'scottmichaelis@comcast.net', 'White', 'Male', '217-72-1430', '', '', 'Randy Hahn', '(804) 526-0424', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Monday evenings', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Baptist', '', '0000-00-00', '', 1),
(539, 'MIDDLETON', 'ELSA', 'MINISTRY-BIBLE STUDY/SPANISH TRANSLATORTERPRETER/SPANISH', '1871 PENDER AVENUE', 'PETERSBURG', 'VA', 23803, '(804) 720-8903', '', '0000-00-00', '0000-00-00', 'Mon 9:30am-11:00am HU1A/B; Wed 1:00-2:00pm HU1CB; Sat 1:00-2:30pm HU6', '', '', '', 'Letter of Recommendation', '', 'emiddleton6@gmail.com', 'Hispanic', 'Female', '552-98-9314', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'JEHOVAHS WITNESS', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(540, 'MILLER', 'TONY', 'MINISTRY-SUNDAY SERVICE', '13001 CROWN RIDGE LOOP #102', 'MIDLOTHIAN', 'VA', 23112, '(804) 536-5252', '(804) 536-5252', '0000-00-00', '0000-00-00', '3RD SUN 9:30-10:45 HU3B, E, 1CC,MH MALES', '', 'Mt. Gilead Full Gospel', '', '', '', 'chelestony1@aol.com', 'Black', 'Male', '230-25-7866', '', '', 'Daniel Robertson JR', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Non-Denominational', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Nondenominational', '', '0000-00-00', '', 1),
(541, 'MINCKS', 'JEFFREY', 'AA MEETINGS/MINISTRY-CATHOLIC SERVICE', '209 CHESTERFIELD AVENUE', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 748-1491', '(804) 536-8291', '0000-00-00', '0000-00-00', 'Sat 10:00-11:00am/Fri 7:30-9:30pm', '', 'St. Anns Catholic Church', '', 'Letter of Recommendation', '', 'mincksj@chestefield.gov', 'White', 'Male', '289-44-1182', '', '17111 JEFFERSON DAVIS HIGHWAY', 'LOUIS RUOFF', '804-526-2548', 'Music Minister', 'MINISTRY/SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Catholic Service', '', '', 0, '0000-00-00', '0000-00-00', 18, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(542, 'MINES', 'BRENDA', 'MINISTRY-ADMINISTRATIVE ASSISTANT', '13208 BRADLEY BRIDGE ROAD', 'CHESTER', 'VA', 23831, '', '', '0000-00-00', '0000-00-00', '', '', 'First Baptist Church', '', '', '', '', 'Black', 'Female', '227-62-4533', '', 'Harrison Street, Petersburg', 'Jeremiah Tillman', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'INACTIVE', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Baptist', '', '0000-00-00', '', 1),
(543, 'MODIRI', 'ROB', 'MINISTRY-SUNDAY SERVICE', '4507 WILDWOOD DRIVE', 'DISPUTANTA', 'VA', 23842, '(757) 894-3585', '(804) 720-1752', '0000-00-00', '0000-00-00', '1ST SUN 2:00-3:45PM HU1B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(544, 'MODIRI', 'VIOLET', 'MINISTRY-SUNDAY SERVICE', '4507 WILDWOOD DRIVE', 'DISPUTANTA', 'V A', 23842, '', '(757) 894-3585', '0000-00-00', '0000-00-00', '1ST SUN 2:00-3:45PM HU1B', '', 'Destination Church', '', '', '', 'vmodiri@liberty.edu', '', 'Female', '225-17-1433', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ADMINISTRATIVE', 'Thursday10:00am-2:00pm', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(545, 'MOODY', 'REBECCA', 'MINSTRY-SUNDAY SERVICE', '2315 DELROSE DRIVE', 'HOPEWELL', 'VA', 23860, '(804) 541-3967', '(804) 514-5900', '0000-00-00', '0000-00-00', '1st & 3rd SUN 8:30-9:15AM HU1A', '', 'Friendship Baptist', '', '', '', 'moody2315d@aol.com', 'Black', 'Female', '230-86-0052', '', '1305 Arlington Road, Hopewell, VA 23860', 'Norwood Carson', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Baptist', '', '0000-00-00', '', 1),
(546, 'MORGAN', 'BEVERLY', 'HIV/ HEP C TESTING COUNSELOR', '2246 CONCORD AVENUE', 'RICHMOND', 'VA', 23234, '(804) 386-6354', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Letter of Recommendation', '', '', 'Black', 'Female', '228-35-1496', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(547, 'MORRIS', 'REGINA', 'HIV/ HEP C TESTING COUNSELOR', '5309 DALGLISH ROAD', 'RICHMOND', 'VA', 23223, '(804) 909-0297', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Certificate', '', '', 'Black', 'Female', '228-41-3417', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(548, 'MUNFORD', 'MARCIA', 'CAREER READINESS', '5105 TIFFANYWOODS LANE', 'HENRICO', 'VA', 23223, '(804) 212-7864', '', '0000-00-00', '0000-00-00', 'Tues & Fri 2:00pm-3:00pm', '', '', '', 'Degree', '', '', 'Black', 'Female', '225-82-0090', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(549, 'NETZLEY', 'MARY', 'AA MEETINGS', '3812 PUDDLEDOCK ROAD # 26', 'PRINCE GEORGE', 'VA', 23875, '(804) 920-0401', '', '0000-00-00', '0000-00-00', '2nd & 3rd Sat 8:00am-9:00am', '', '', '', 'Life Experiences', '', '', 'White', 'Female', '229-48-1207', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(550, 'PABON-TORRES', 'RICARDO', 'MINISTSRY-BIBLE STUDY/COUNSELING', '5425 WILLOW OAK DRIVE', 'PRINCE GEORGE', 'VA', 23875, '(804) 255-3201', '', '0000-00-00', '0000-00-00', 'Wed 7:30pm-8:30pm/ 1st & 3rd Fri 9:00am-11:00am', '', 'Life Church', '', 'Certificate', '', 'ricardo.pabontorres@gmail.com', 'Hispanic', 'Male', '581-45-6114', '', 'Colonial Heights, VA 23834', 'Scott Tischler', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(551, 'PAGE', 'CLARENCE', 'AA MEETINGS', '320 EASTMAN AVENUE', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 894-5709', '', '0000-00-00', '0000-00-00', 'Fri 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '227-92-3582', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(552, 'PARRISH', 'APRIL', 'REENTRY REGENESIS HOUSING', '123 WRIGHT AVENUE APT A', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 451-4481', '(304) 657-6739', '0000-00-00', '0000-00-00', 'Tues or Thurs 9:00am-11:00am', '', '', '', '', '', '', 'White', 'Female', '232-25-2357', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(553, 'PATTERSON', 'JAMES', 'MINISTRY-BIBLE STUDY', '2612 PERRY STREET', 'HOPEWELL', 'VA', 23860, '(804) 731-2877', '(804) 255-0399', '0000-00-00', '0000-00-00', 'TUE 7:30-9:00PM HU5', '', '', '', '', '', '', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(554, 'PATTERSON', 'RICO', 'MINISTRY-SUNDAY SERVICE', '3819 CRESTHILL ROAD', 'CHESTER', 'VA', 23831, '(804) 383-4868', '(804) 317-0965', '0000-00-00', '0000-00-00', '3RD SUN 9:30-10:45AM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(555, 'PETERSON', 'LAWANA \"RENE\"', 'MINISTRY-SUNDAY SERVICE', '1510 DELAWARE AVENUE', 'HOPEWELL', 'VA', 23860, '(804) 737-3577', '(804) 892-9343', '0000-00-00', '0000-00-00', 'SUN 8:00-9:15AM HU2D, E', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(556, 'PIERCE, JR.', 'JUAN', 'HIV/HEP C TESTING COUNSELOR', '8843 PROCTORS RUNDRIVE', 'NORTH CHESTERFIELD', 'VA', 23237, '(804) 677-2562', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Certificate', '', '', 'Black', 'Male', '231-49-6732', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(557, 'PIERCE, SR.', 'JUAN', 'HIV/ HEP C Prevention Education Awareness', '1416 NORTH 24TH STREET', 'RICHMOND', 'VA', 23223, '(804) 641-1555', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Certificate', '', '', 'Black', 'Male', '227-96-7498', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'HIV Facilitator', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(558, 'POWELL', 'KAREN', 'REENTRY SUPPORT GROUP', '10425 MELISSA MILL ROAD', 'RICHMOND', 'VA', 23236, '(804) 380-4050', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', 'drkarpow2018@gmail.com', 'White', 'Female', '240-23-9077', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1);
INSERT INTO `program` (`id`, `last_name`, `first_name`, `group_name`, `address`, `city`, `state`, `zip`, `home_phone`, `cell_number`, `birthdate`, `date_hired`, `schedule`, `signature`, `church_locator`, `work_phone`, `experience_training`, `degree_type`, `email`, `race`, `sex`, `ssn`, `document_status`, `church_address`, `church_leader`, `church_phone`, `specific_skill_education`, `category_name`, `quarter_meeting_attended`, `vol_dinner_rsvp`, `dinner_guest`, `attended_quarterly_meeting`, `active_inactive_terminated`, `activity_status`, `ministry_group`, `chaplain_assistant`, `on_call_schedule`, `on_call_status`, `birth_month`, `minisitry_orientation`, `volume_manual_number`, `prea_training`, `main`, `hu6`, `denomination`, `devices_approved`, `termination_date`, `termination_reason`, `is_volunteer`) VALUES
(559, 'PUGH', 'CASAUNDRA', 'MINISTRY/ BIBLESTUDY/ SPIRTUAL COUNSELING', '6020 ALMOND CREEK NORTH LANE', 'HENRICO', 'VA', 23231, '', '(336) 803-9035', '0000-00-00', '0000-00-00', 'Thurs 9:00am-3:00pm', '', '', '', 'Certificate of Ordiniation', 'LICENSE', 'casaundra12@gmail.com', 'Black', 'Female', '135-64-1671', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(560, 'RAMIREZ JR.', 'RAYMOND', 'MINISTRY-SPANISH BIBLE STUDY', '103 PRINCETON ROAD', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 216-1392', '(804) 216-1392', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(561, 'RAMSEY', 'ROBERT', 'AA MEETINGS', '5831 SARA KAY DRIVE', 'NORTH CHESTERFIELD', 'VA', 23237, '(804) 218-6757', '', '0000-00-00', '0000-00-00', '2nd & 4th Wed 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'White', 'Male', '379-50-6656', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 229, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(562, 'REED', 'EDDIE', 'MINISTRY-COUNSELING', '1600 ATLANTIC STREET', 'HOPEWELL', 'VA', 23860, '(804) 458-6765', '(804) 452-0920', '0000-00-00', '0000-00-00', 'THU HU3C, D, E', '', '', '', '', '', 'eddiereed1997@gmail.com', 'White', 'Male', '247-21-3016', 'commitment agreement; ordination or license', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', 'acoustic guitar', '0000-00-00', '', 1),
(563, 'ROBERTSON', 'TONETTE', 'DISTRICT 19', '4400 JEFFERSON POINTE LANE APT # 12', 'PRINCE GEORGE', 'VA', 23875, '(434) 213-0476', '(434) 213-0476', '0000-00-00', '0000-00-00', 'Tues & Thurs 9:30am-11:00am', '', '', '', 'Degree', '', 'trobertson@d19csb.com', 'Black', 'Female', '226-61-1405', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(564, 'ROBERTSON', 'IOLA', 'MINSTRY-SUNDAY SERVICE', '1715 4TH AVENUE', 'RICHMOND', 'VA', 23222, '(804) 852-4330', '(804) 852-4330', '0000-00-00', '0000-00-00', '2ND SUN 2:00-3:45PM HU1B; 5TH SUN 2:00-3:45PM HU1B', '', 'Colonial Heights Baptist', '', '', '', 'andlearnon3@yahoo.com', '', 'Female', '226-15-2824', '', '', 'Randy Hahn', '(804) 526-0424', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(565, 'ROBINSON', 'EDDIE', 'MINISTRY-SUNDAY SERVICE', '6409 BLAIR COURT', 'PRINCE GEORGE', 'VA', 23875, '(248) 798-1229', '(248) 798-1229', '0000-00-00', '0000-00-00', 'SUN ALTERNATE', '', '', '', '', '', 'elr2004@verizon.net', 'Black', 'Male', '431-86-3593', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(566, 'SAWYER', 'PAMELA', 'HIV/  Prevention Education Awareness', '1400 BRANDERSBRIDGE APT # C7', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 397-3429', '', '0000-00-00', '0000-00-00', '4th Sat 9:30am-10:30am', '', 'Victory Christian United Church of Christ', '', 'License', '', '', 'Black', 'Female', '165-48-1153', '', '32 WYTHE STREET PETERSBURG,VA', 'ROSE WRIGHT-SCOTT', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'HIV Facilitator', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(567, 'SERVAIS', 'MICHAEL', 'MINISTRY-COUNSELING', '10409 MELISSA MILL ROAD', 'RICHMOND', 'VA', 23236, '(804) 727-9388', '', '0000-00-00', '0000-00-00', 'HU2D, E', '', '', '', '', '', '', 'White', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'ANYTIME', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(568, 'SIMPSON', 'LAWANA', 'MINISTRY-SUNDAY SERVICE', '1811 ROSEWOOD AVENUE', 'RICHMOND', 'VA', 23220, '(804) 359-8117', '(804) 405-7709', '0000-00-00', '0000-00-00', 'SUN 8:00-9:15AM HU2D, E', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(569, 'SINCLAIR', 'JANELL', 'HEBRON PROGRAM', '1644 SOUTH SYCAMORE STREET', 'PETERSBURG', 'VA', 23805, '(904) 401-1330', '', '0000-00-00', '0000-00-00', '2nd & 4th Tues 7:30pm-9:30pm', '', '', '', 'Degree', '', '', 'Black', 'Female', '223-27-4939', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(570, 'SKAAR', 'STEVEN', 'MINISTRTY-COUNSELOR/ADMIISTRATIVE ASSISTANT', '6324 EAGLE CREST LANE', 'CHESTERFIELD', 'VA', 23832, '(540) 577-0991', '', '0000-00-00', '0000-00-00', 'Thu 2:30-4:30pm HU3A/B/ Mon 2:00-4:00pm', '', 'West End Presbyterian', '', '', '', '', 'White', 'Male', '151-44-3377', '', 'Hopewell', 'Eddie Reed', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Presbyterian', 'ADMINISTRATIVE', 'Monday 10:00am-2:00pm', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(571, 'SMITH', 'CHARLES \"BO\"', 'MINISTRY-SUNDAY SERVICE/ADMINISTRATIVE ASSISTANT', '14410 BRANDING IRON ROAD', 'CHESTERFIELD', 'VA', 23838, '(804) 739-2009', '', '0000-00-00', '0000-00-00', 'Sun 9:30-10:45am (1st & 5th)-HU2A; Wed 8:00am-2:00pm', '', 'Hope Chapel Four Square', '', '', '', 'cdar@hotmail.com', 'White', 'Male', '231-84-5934', '', '', 'Dave Muckel', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ADMINISTRATIVE', 'BIBLE DISTRIBUTION', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(572, 'SMITH', 'DORETHEA', 'MINISTRY-SUNDAY SERVICE', '7540 BROOKSHIRE DRIVE', 'PRINCE GEORGE', 'VA', 23875, '(804) 861-2597', '(804) 731-7630', '0000-00-00', '0000-00-00', '4TH SUN 2:00-3:45PM HU1B', '', 'Faith & Hope Temple COGIC Pentacostal', '', '', '', 'smithd01@aol.com', 'Black', 'Female', '223-60-1423', '', '', 'Dr. Herman Crockett', '(804) 861-3898', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Pentacostal', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Pentacostal', '', '0000-00-00', '', 1),
(573, 'SOMERS', 'HOWARD', 'NA MEETINGS', '8 EASTOVER AVENUE', 'PETERSBURG', 'VA', 23803, '(804) 590-4448', '', '0000-00-00', '0000-00-00', 'Wed 7:30pm-8:30pm or 2nd & 4th Sun 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '153-52-7965', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 261, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(574, 'SQUIRE', 'ELLIS', 'MINISTRY-COUNSELING', '7650 HUNTERS RIDGE DRIVE', 'PRINCE GEORGE', 'VA', 23875, '', '(804) 712-4000', '0000-00-00', '0000-00-00', 'Tue & Sat  9:00-11:00amHU2D, E', '', '', '', '', '', 'faithwok@yahoo.com', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Tuesday & Saturday 0900-1400 hours', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(575, 'SWICEGOOD', 'BEN', 'MINISTRY-', '13800 TURTLE HILL ROAD', 'MIDLOTHIAN', 'VA', 23112, '(804) 878-8844', '(804) 878-8844', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(576, 'TAYLOR', 'STANLEY', 'HIV-HEP C TESTING COUNSELOR', '3505 CHAMBERLAYNE AVENUE', 'RICHMOND', 'VA', 23227, '(804) 647-1540', '', '0000-00-00', '0000-00-00', 'Varies', '', '', '', 'Letter of Recommendation', '', 'stanley@mhcprevents.org', 'Black', 'Male', '225-60-4316', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'HIV Testing Counselor', '', '', 0, '0000-00-00', '0000-00-00', 227, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(577, 'TAYLOR', 'LOUCINDA', 'AA MEETINGS', '13304 SHERRI DRIVE', 'CHESTER', 'VA', 23831, '(804) 777-9676', '', '0000-00-00', '0000-00-00', '2nd Sat 8:00am-9:00am', '', '', '', 'Life Experiences', '', '', 'White', 'Female', '538-76-1238', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 251, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(578, 'TAYLOR', 'GERTRUDE', 'COLLEGE BOUND APPLICATION', '4315 RUFFIN ROAD', 'NORTH PRINCE GEORGE', 'VA', 23860, '(804) 218-2714', '', '0000-00-00', '0000-00-00', '2nd or 3rd or 4th  Tue 8:30am-4:30pm', '', '', '', 'Degree', '', '', 'Black', 'Female', '228-98-1148', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(579, 'TAYLOR', 'AUDREY', 'REENTRY PROGRAMS', '2056 ROCKY FORD ROAD', 'CREWE', 'VA', 23930, '(434) 294-7424', '', '0000-00-00', '0000-00-00', '1st & 2nd or 3rd & 4th Thursday 9:00am-10:30am', '', '', '', '', '', 'ataylor@capup.org', 'Black', 'Female', '228-76-1128', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(580, 'TAYLOR', 'SHIRLEY', 'MINISTRY-SUNDAY SERVICE ALTERNATE', '528 OAK HILL ROAD', 'PETERSBURG', 'VA', 23805, '(804) 861-2601', '(804) 318-0086', '0000-00-00', '0000-00-00', 'Varies', '', 'First Baptist', '', '', '', 'catdog4u2@aol.com', 'White', 'Female', '227-72-6197', '', 'Petersburg', 'Dr. Jeremiah Tillman', '(804) 732-2841', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(581, 'THOMAS', 'RANDY', 'MINISTRY-SUNDAY SERVICE', '540 ROSYLN AVENUE', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 943-2297', '', '0000-00-00', '0000-00-00', '4TH SUN 8:00-9:15AM HU3A, C, D; 9:30-10:45AM HU3B, E, 1CC, MH MALES', '', 'Second Chance Baptist', '', '', '', 'silverfox540@comcast.net', 'White', 'Male', '225-98-3382', '', '', 'Davis Prather', '(804) 720-3421', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Baptist', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(582, 'THOMPSON', 'CONSTANCE', 'MINISTRY-BIBLE STUDY', '14214 THRUSHWOOD COURT', 'CHESTER', 'VA', 23831, '(804) 398-0176', '(804) 398-0176', '0000-00-00', '0000-00-00', 'Varies', '', '', '', '', '', '', 'White', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(583, 'THOMPSON', 'DREMA', 'MINISTRY-SUNDAY SERVICE', '1413 BANTRY TERRACE', 'MIDLOTHIAN', 'VA', 23114, '(804) 253-7507', '(804) 253-7507', '0000-00-00', '0000-00-00', '2ND SUN 8:00-9:15AM HU1A; 9:30-10:45AM HU1CB/MH FEMALES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(584, 'THOMPSON', 'KARL', 'MINSTRY-SUNDAY SERVICE', '1413 BANTRY TERRACE', 'MIDLOTHIAN', 'VA', 23114, '(804) 564-0525', '(804) 564-0525', '0000-00-00', '0000-00-00', '2ND SUN 8:00-9:15AM HU1A; 9:30-10:45AM HU1CB/MH FEMALES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(585, 'TOWNES Jr.', 'HERBERT', 'NA MEETINGS', '1208 SUNNYSIDE AVE', 'HOPEWELL', 'VA', 23860, '(804) 668-8471', '', '0000-00-00', '0000-00-00', 'Wed 7:30pm-8;30pm', '', '', '', 'Life Experiences', '', 'herbertf1957@gmail.com', 'Black', 'Male', '228-92-9240', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 221, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(586, 'TYLER', 'ROBIN', 'CENTRAL VIRGINIA HEALTH SERVICES SEMINAR', '109 LAKEVIEW PARK ROAD', 'COLONIAL HEIGHTS', 'VA', 23834, '(804) 895-3052', '(804) 704-3044', '0000-00-00', '0000-00-00', '4th Thurs 2:00pm--4:00pm', '', '', '', 'License', '', '', 'Black', 'Female', '231-37-8015', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(587, 'WARD', 'JESSE', 'MINISTRY-SUNDAY SERVICE', '1633 TREE RIDGE ROAD', 'RICHMOND', 'VA', 23231, '(804) 929-0590', '', '0000-00-00', '0000-00-00', '1ST SUN 8:00-9:15AM HU3A/C/D; 9:30-10:45AM HU3B/E/1CC/MH Men; 11:15am Juveniles', '', '', '', '', '', 'jwardprov35@yahoo.com', 'Black', 'Male', '225-84-2885', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(588, 'WATERS', 'ROGER', 'NA MEETINGS', '4901 CREEK ROAD', 'NORTH DINWIDDIE', 'VA', 23803, '(804) 895-1609', '', '0000-00-00', '0000-00-00', '1st & 3rd Wed 7:30pm-8:30pm', '', '', '', 'Life Experiences', '', '', 'Black', 'Male', '216-58-0449', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(589, 'WEBBER', 'TOSHAWN', 'RE-ENTRY WORKFORCE', '1723 ROGERS STREET', 'RICHMOND', 'VA', 23223, '', '(804) 304-3067', '0000-00-00', '0000-00-00', 'Wed 9:00am-3:00pm', '', '', '', 'MOU', '', 'shwanwebber71@yahoo.com', 'Black', 'Female', '231-08-5234', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(590, 'WHISONANT', 'WARLISHA', 'MINISTRY-SUNDAY SERVICE', '10 EAST 36TH STREET', 'RICHMOND', 'VA', 23224, '(804) 283-2182', '', '0000-00-00', '0000-00-00', '1ST SUN ALTERNATE', '', '', '', '', '', '', 'Black', 'Female', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(591, 'WHITE', 'CATHY', 'MINISTRY-COUNSELING', '7700 MIDDLEFIELD MEWS', 'CHESTERFIELD', 'VA', 23832, '(804) 283-2182', '', '0000-00-00', '0000-00-00', 'Wed or Fri 8:30-11:00am HU1C FEMALES', '', 'Mt. Gilead Full Gospel', '', '', '', 'honey2within@gmail.com', 'Black', 'Female', '229-84-9487', '', '', 'Daniel Robertson', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Full Gospel', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', 'Full Gospel', '', '0000-00-00', '', 1),
(592, 'WHITEHEAD JR.', 'LANGSTON', 'MINISTRY-COUNSELING', '2241 NEW MARKET ROAD', 'HENRICO', 'VA', 23231, '(804) 795-5636', '(804) 318-0057', '0000-00-00', '0000-00-00', 'TUE 9:00-11:00am HU2D, E', '', '', '', '', '', 'whitehead4you@comcast.net', 'Black', 'Male', '', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', 'ON CALL', 'Wednesday 9:00-11:00am', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(593, 'WILLIAMS III', 'ROBERT L.', 'MINISTRY-SUNDAY SERVICE', '401 NORTH WILKINSON ROAD', 'RICHMOND', 'VA', 23227, '(858) 776-5143', '', '0000-00-00', '0000-00-00', '3RD SUN 2:00-3:45PM', '', '', '', '', '', 'lawnrlw@aol.com', 'Black', 'Male', '265-87-5480', '', '', '', '', '', 'MINISTRY', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', '0000-00-00', '', 1),
(594, 'ZAHRINGER', 'JAMES', 'VETERANS JUSTICE OUTREACH SPECIALIST', '2104 AUTUMN OAKS LANE', 'POWHATAN', 'VA', 23139, '(804) 895-1507', '(804) 895-1507', '0000-00-00', '0000-00-00', 'Varies', '', '', '(804) 605- 2832', 'Degree', '', 'JJZAHRINGER@GMAIL.COM', 'White', 'Male', '220-90-4802', '', '', '', '', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'ACTIVE', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', 'Main Jail', '', '', '', '0000-00-00', '', 1),
(595, 'ZARIF', 'HASAN', 'RE-ENTRY SERVICES GROUP', '6624 BATTLEWOOD ROAD', 'RICHMOND', 'VA', 23234, '(804) 662-0270', '', '0000-00-00', '0000-00-00', '2nd Friday 8:30am-4:30pm', '', 'EPHESUS SEVENTH DAY ADVENTIST CHURCH RICHMOND,VA', '(804) 358- 7660', 'License', '', 'hkzarif@comcast.net', 'Black', 'Male', '225-74-3451', '', '2317 WESTWOOD AVENUE', 'CECIL MCFARLAND', '804-643-4000', '', 'SECULAR', '0000-00-00', 0, 0, 0, 'COVID INACTIVE', '', 'Re-Entry-Church Service', '', '', 0, '0000-00-00', '0000-00-00', 154, '0000-00-00', 'Main Jail', 'HU6', '', '', '0000-00-00', '', 1),
(596, 'asd', 'asd', '', '', '', '', 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 0, 0, 0, 'inactive', '', '', '', '', 0, '0000-00-00', '0000-00-00', 0, '0000-00-00', '', '', '', '', NULL, NULL, 1);

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
(8, 'warehouse manager'),
(9, 'supervisor'),
(10, 'user');

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

--
-- Dumping data for table `tablet`
--

INSERT INTO `tablet` (`id`, `inmate_number`, `first_name`, `middle_name`, `last_name`, `date_found`, `is_reported`, `is_filed`, `is_charged`, `is_paid`, `note`) VALUES
(19, 45991, 'MICHAEL', 'ERIC', 'JENKINS', NULL, 0, 0, 0, 0, 'Broke 2 tablets.'),
(20, 85476, 'BENJAMIN', 'DALE', 'LAUTERBACH', NULL, 1, 0, 0, 0, ''),
(21, 85476, 'BENJAMIN', 'DALE', 'LAUTERBACH', NULL, 0, 0, 0, 0, ''),
(22, 81601, 'IOSHA', 'NACHELLE', 'MORGAN', NULL, 0, 0, 0, 0, ''),
(23, 72062, 'KEWUAN', 'MALIK', 'JASEY', NULL, 0, 0, 0, 0, ''),
(24, 82529, 'Jorge', 'M', 'PALAEZ AUILA', NULL, 0, 0, 0, 0, ''),
(25, 77381, 'NEIL', NULL, 'HOOPER', NULL, 0, 0, 0, 0, ''),
(26, 25980, 'ALONZA', 'ANTHONY', 'ELLIS', NULL, 0, 0, 0, 0, ''),
(27, 83429, 'YAHIR', 'ESTUARDO', 'BARRIENTOS', NULL, 1, 1, 1, 0, ''),
(28, 85238, 'BRANDON', 'LEE', 'TANNER', NULL, 0, 0, 0, 0, 'Burned a hole in assigned Tablet'),
(29, 74009, 'SHAWN', 'TIMOTHY', 'GIRARD', NULL, 1, 1, 1, 0, ''),
(30, 21707, 'MICHAEL', 'KENNETH', 'DAWSON', NULL, 1, 0, 0, 0, ''),
(31, 85351, 'DENZEL', 'KADEEM', 'GAINES', NULL, 0, 0, 0, 0, ''),
(32, 10539, 'JAMES', 'WILLIAM', 'HILL', NULL, 0, 0, 0, 0, ''),
(33, 73162, 'RAYVAUGHN', 'TELVIN', 'JOHNSON', NULL, 1, 0, 0, 0, ''),
(34, 65203, 'BRADLEY', 'JAMES', 'HALL', NULL, 0, 0, 0, 0, ''),
(35, 81610, 'DAVID', 'LEE', 'HINES', NULL, 1, 0, 0, 0, ''),
(36, 86181, 'WISDOM', 'EMMANUEL', 'PIRTLE', NULL, 0, 0, 0, 0, ''),
(37, 83324, 'TAMMARA', 'DENAY', 'PEACE', NULL, 1, 1, 1, 0, ''),
(38, 84406, 'LOPEZ', NULL, 'HECTOR', '2024-05-20', 0, 0, 0, 0, ''),
(39, 70822, 'RAQUAN', 'TERELL', 'BETHEA', '2024-05-20', 0, 0, 0, 0, ''),
(40, 31945, 'TYESHA', 'DENISE', 'MALONE', '2024-05-20', 0, 0, 0, 0, ''),
(41, 81949, 'EJIYA', 'LAMARCUS', 'CARSON', '2024-05-20', 1, 1, 1, 0, ''),
(42, 86230, 'VERNON', NULL, 'HARRISON', '2024-05-21', 1, 1, 1, 0, ''),
(43, 36096, 'LEONARD', 'BRANDON', 'BOGAN', '2024-05-20', 1, 1, 1, 0, ''),
(44, 84111, 'DESHAWN', 'LAMONT', 'LYONS', NULL, 0, 0, 0, 0, ''),
(45, 42962, 'DONALD', 'RAY', 'COOKE', NULL, 1, 0, 0, 0, ''),
(46, 85272, 'VASQUEZ', NULL, 'MORALES', NULL, 0, 0, 0, 0, ''),
(47, 82068, 'MARLON', 'MAURICE', 'JOHNSON', NULL, 1, 0, 0, 0, ''),
(48, 86291, 'JACOB', NULL, 'MIDKIFF', NULL, 0, 0, 0, 0, ''),
(49, 84432, 'JESSIE', 'SCOTT', 'HICKS', NULL, 0, 0, 0, 0, ''),
(50, 82382, 'DAVID', 'CHARLES', 'JOHNSON', NULL, 0, 0, 0, 0, ''),
(51, 85973, 'ERIC', NULL, 'SUCHOMELLY', NULL, 1, 0, 0, 0, ''),
(52, 82474, 'JESIAH', NULL, 'FLOWERS', NULL, 0, 0, 0, 0, ''),
(53, 81180, 'JUMON', 'DIAMONTE', 'BELTON', NULL, 0, 0, 0, 0, ''),
(54, 76255, 'MATTHEW', 'S', 'PERKINS', NULL, 0, 0, 0, 0, ''),
(55, 33045, 'BRANDON', 'LEE', 'CRUTCHFIELD', NULL, 1, 0, 0, 0, ''),
(56, 84405, 'JOHNNY', 'DANIEL', 'FUQUA', '2024-04-01', 0, 0, 0, 0, ''),
(57, 86049, 'DARIAN', 'LAVEY', 'HERRING', '2024-04-17', 1, 0, 0, 0, 'Broke inmate Shannons tablet.'),
(58, 67149, 'JEFFREY', 'DANIEL', 'CONNER', '2024-04-23', 1, 1, 1, 0, ''),
(59, 69960, 'MELVIN', 'LEON', 'MYRICK', '2024-04-23', 1, 1, 1, 0, ''),
(60, 39171, 'BRYANT', 'KYLE', 'SAUNDERS', NULL, 0, 0, 0, 0, ''),
(61, 86902, 'SHELTON', NULL, 'JONES', NULL, 0, 0, 0, 0, ''),
(62, 19590, 'ANTHONY', 'JAMES', 'ANGELINA', NULL, 1, 1, 1, 0, ''),
(63, 56902, 'SUSAN', 'MICHELLE', 'ARCHER', NULL, 1, 1, 1, 0, ''),
(64, 66091, 'MELVYN', 'PERRY', 'CHATMAN', NULL, 0, 0, 0, 0, ''),
(65, 86782, 'JACOB', NULL, 'BELLAMY', NULL, 0, 0, 0, 0, ''),
(66, 13026, 'ALGIA', 'WEBSTER', 'BAILEY', '2024-04-30', 1, 0, 0, 0, ''),
(67, 63517, 'JAMES', 'M', 'MCGRATH', '2024-04-30', 0, 0, 0, 0, ''),
(68, 85222, 'NERY', NULL, 'ESTRADA', '2024-05-20', 0, 0, 0, 0, ''),
(69, 81857, 'ALEXANDER', NULL, 'NELSON', '2024-05-21', 0, 0, 0, 0, ''),
(70, 87016, 'ANDRE', NULL, 'GLOVER', '2024-05-28', 0, 0, 0, 0, ''),
(71, 86957, 'LARRY', NULL, 'STONE', '2024-05-28', 0, 0, 0, 0, 'Burned a hole in the tablet'),
(72, 12602, 'JASON', 'LEE', 'MEEKINS', '2024-05-28', 1, 0, 0, 0, 'Broken Screen'),
(73, 81034, 'TRAVIS', 'DALTON', 'VAUGHAN', '2024-05-28', 1, 0, 0, 0, 'Back Broken'),
(74, 80282, 'JAMARI', 'ANTONIO', 'TAYLOR', '2024-05-28', 0, 0, 0, 0, 'Broken Screen'),
(75, 85670, 'JAMARCUS', 'VYSHAWN', 'WATKINS', '2024-05-28', 1, 0, 0, 0, ''),
(76, 47372, 'GENE', 'RAY', 'BROWDER', NULL, 1, 1, 1, 0, ''),
(77, 55254, 'RONALD', 'LEE', 'HUNT', '2024-06-13', 1, 1, 0, 0, 'Tablet was destroyed and all that was found was the battery.'),
(78, 87249, 'CORY', 'LEE', 'JACOBS', '2024-06-10', 0, 0, 0, 0, 'Tablet was broken in half and parts removed'),
(79, 75434, 'ANDRE', 'CORTEZ', 'SCOTT', '2024-06-21', 1, 0, 0, 0, 'Kiosk broken'),
(80, 75434, 'ANDRE', 'CORTEZ', 'SCOTT', NULL, 1, 0, 0, 0, 'Tablet broken');

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
(26, 'Mark', 'Tuggle', 'tugglem@rrjva.org', '$2y$10$vFTrZ/xzgRHmrHbvfyJCruLNpYfw6bBJrviiQHV97melHBfSUibtG', 1),
(27, 'Heather', 'Scott', 'heather.scott@icsolutions.com', '$2y$10$ciRdDHbwqXYnUl0v003TIOQLWmoc.9HTVdVENRv/J9Fjsocm36dYi', 2),
(28, 'Danny', 'Hines', 'danny.hines@icsolutions.com', '$2y$10$ruKyoggOrx8.I/TdNEIZCeo88HfJ/Iowfo7SDUfCpfRqYO72IdZLm', 2),
(29, 'Neil', 'Marlowe', 'nmarlowe@rrjva.org', '$2y$10$Qkzeq5l28lzYk2ZtdXRREO.v2i13w5Xg5aLNDeBU/4sq7wWFCgyye', 1),
(30, 'Charlene', 'Jones', 'jones.charlene@rrjva.org', '$2y$10$Na.SONOfk4RNUInKG82Cseq9G2cX94nxLgT2eMFW/f9WSPSk8oVyK', 4),
(34, 'Babette', 'Coleman', 'bcoleman@rrjva.org', '$2y$10$op2X.2gZtQyV6M.7cxHEs.UG9oLcezgIWVgukFC60buyV/PoE.e6a', 5),
(35, 'Sabrina', 'Whitaker', 'whitaker.sabrina@rrjva.org', '$2y$10$SGYsgLEMu/i3PxMRFJ56/.7WIx69kF8Nmo6hq0GafsoiGp6ShhUVe', 7),
(37, 'Charles', 'Watson', 'watson.charles@rrjva.org', '$2y$10$0FuPaK28LZCUQXd3DHXY9utJmLh5lIm9RNhqVE7KkXuy1xa2ZYiTW', 8),
(38, 'supervisor', 'supervisor', 'supervisor', '$2y$10$4fkgUNeWyISkF9zCSCsNQ.KH5GI5o5wPBGOvp/qiuKVJcG4Zrtpnm', 9),
(39, 'user', 'user', 'user', '$2y$10$eynphqZgwof32Ick.HfQM..0umHLLJqiCigOa.XZFZ1A4dK7Lf7CK', 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
