-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:01 PM
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
(4, '395', 'IT SUPPORT TECHNICIAN', 'TUGGLE, MARK A', '(907) 901-1977', 'tugglem@rrjva.org', '3100'),
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
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `cell_phone` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `date_hired` date NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `church_locator` varchar(255) NOT NULL,
  `work_phone` varchar(255) NOT NULL,
  `experience_training` varchar(255) NOT NULL,
  `degree_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `document_status` varchar(255) NOT NULL,
  `church_address` varchar(255) NOT NULL,
  `church_leader` varchar(255) NOT NULL,
  `church_phone` varchar(255) NOT NULL,
  `specific_skills_education` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `quarterly_meeting_attended` date NOT NULL,
  `volunteer_dinner_rsvp` tinyint(1) NOT NULL,
  `dinner_guest` tinyint(1) NOT NULL,
  `attended_quarterly_meeting` tinyint(1) NOT NULL,
  `active_inactive_terminated` varchar(255) NOT NULL,
  `activity_status` varchar(255) NOT NULL,
  `ministry_group` varchar(255) NOT NULL,
  `chaplains_assistant` varchar(255) NOT NULL,
  `on_call_status` tinyint(1) NOT NULL,
  `birth_month` varchar(255) NOT NULL,
  `ministry_orientation` varchar(255) NOT NULL,
  `vol_manual_number` int(255) NOT NULL,
  `prea_training` date NOT NULL,
  `main` varchar(255) NOT NULL,
  `hu6` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `devices_approved` varchar(255) NOT NULL,
  `termination_date` date NOT NULL,
  `termination_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `section` varchar(255) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `name`, `title`, `section`, `extension`) VALUES
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
(151, 'R. Weeks', 'Case Worker, TU, THU', 'Case Workers', '6006'),
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
(4, 'mailroom');

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
(33, 73162, 'RAYVAUGHN', 'TELVIN', 'JOHNSON', NULL, 0, 0, 0, 0, ''),
(34, 65203, 'BRADLEY', 'JAMES', 'HALL', NULL, 0, 0, 0, 0, ''),
(35, 81610, 'DAVID', 'LEE', 'HINES', NULL, 0, 0, 0, 0, ''),
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
(47, 82068, 'MARLON', 'MAURICE', 'JOHNSON', NULL, 0, 0, 0, 0, ''),
(48, 86291, 'JACOB', NULL, 'MIDKIFF', NULL, 0, 0, 0, 0, ''),
(49, 84432, 'JESSIE', 'SCOTT', 'HICKS', NULL, 0, 0, 0, 0, ''),
(50, 82382, 'DAVID', 'CHARLES', 'JOHNSON', NULL, 0, 0, 0, 0, ''),
(51, 85973, 'ERIC', NULL, 'SUCHOMELLY', NULL, 1, 0, 0, 0, ''),
(52, 82474, 'JESIAH', NULL, 'FLOWERS', NULL, 0, 0, 0, 0, ''),
(53, 81180, 'JUMON', 'DIAMONTE', 'BELTON', NULL, 0, 0, 0, 0, ''),
(54, 76255, 'MATTHEW', 'S', 'PERKINS', NULL, 0, 0, 0, 0, ''),
(55, 33045, 'BRANDON', 'LEE', 'CRUTCHFIELD', NULL, 0, 0, 0, 0, ''),
(56, 84405, 'JOHNNY', 'DANIEL', 'FUQUA', '2024-04-01', 0, 0, 0, 0, ''),
(57, 86049, 'DARIAN', 'LAVEY', 'HERRING', '2024-04-17', 1, 0, 0, 0, 'Broke inmate Shannon\'s tablet.'),
(58, 67149, 'JEFFREY', 'DANIEL', 'CONNER', '2024-04-23', 1, 1, 1, 0, ''),
(59, 69960, 'MELVIN', 'LEON', 'MYRICK', '2024-04-23', 1, 1, 1, 0, ''),
(60, 39171, 'BRYANT', 'KYLE', 'SAUNDERS', NULL, 0, 0, 0, 0, ''),
(61, 86902, 'SHELTON', NULL, 'JONES', NULL, 0, 0, 0, 0, ''),
(62, 19590, 'ANTHONY', 'JAMES', 'ANGELINA', NULL, 1, 1, 1, 0, ''),
(63, 56902, 'SUSAN', 'MICHELLE', 'ARCHER', NULL, 1, 1, 1, 0, ''),
(64, 66091, 'MELVYN', 'PERRY', 'CHATMAN', NULL, 0, 0, 0, 0, ''),
(65, 86782, 'JACOB', NULL, 'BELLAMY', NULL, 0, 0, 0, 0, ''),
(66, 13026, 'ALGIA', 'WEBSTER', 'BAILEY', '2024-04-30', 0, 0, 0, 0, ''),
(67, 63517, 'JAMES', 'M', 'MCGRATH', '2024-04-30', 0, 0, 0, 0, ''),
(68, 85222, 'NERY', NULL, 'ESTRADA', '2024-05-20', 0, 0, 0, 0, ''),
(69, 81857, 'ALEXANDER', NULL, 'NELSON', '2024-05-21', 0, 0, 0, 0, ''),
(70, 87016, 'ANDRE', NULL, 'GLOVER', '2024-05-28', 0, 0, 0, 0, ''),
(71, 86957, 'LARRY', NULL, 'STONE', '2024-05-28', 0, 0, 0, 0, 'Burned a hole in the tablet'),
(72, 12602, 'JASON', 'LEE', 'MEEKINS', '2024-05-28', 0, 0, 0, 0, 'Broken Screen'),
(73, 81034, 'TRAVIS', 'DALTON', 'VAUGHAN', '2024-05-28', 0, 0, 0, 0, 'Back Broken'),
(74, 80282, 'JAMARI', 'ANTONIO', 'TAYLOR', '2024-05-28', 0, 0, 0, 0, 'Broken Screen'),
(75, 85670, 'JAMARCUS', 'VYSHAWN', 'WATKINS', '2024-05-28', 0, 0, 0, 0, ''),
(76, 47372, 'GENE', 'RAY', 'BROWDER', NULL, 1, 1, 1, 0, '');

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
(20, 'asd', 'asd', 'asd', '$2y$10$6uMHNNdfOca2YPhFHGX.EOUAxqfy2CG8ayUGIEgTkpSmUIIMH3TKC', 1),
(26, 'Mark', 'Tuggle', 'tugglem@rrjva.org', '$2y$10$YX4NUpNfpclLmVKwRmj2W.tHw6WLcATxgIp/elZJI2llypXiu741.', 1),
(27, 'Heather', 'Scott', 'heather.scott@icsolutions.com', '$2y$10$ciRdDHbwqXYnUl0v003TIOQLWmoc.9HTVdVENRv/J9Fjsocm36dYi', 2),
(28, 'Danny', 'Hines', 'danny.hines@icsolutions.com', '$2y$10$ruKyoggOrx8.I/TdNEIZCeo88HfJ/Iowfo7SDUfCpfRqYO72IdZLm', 2),
(29, 'Neil', 'Marlowe', 'nmarlowe@rrjva.org', '$2y$10$Qkzeq5l28lzYk2ZtdXRREO.v2i13w5Xg5aLNDeBU/4sq7wWFCgyye', 1),
(30, 'Charlene', 'Jones', 'jones.charlene@rrjva.org', '$2y$10$Na.SONOfk4RNUInKG82Cseq9G2cX94nxLgT2eMFW/f9WSPSk8oVyK', 4);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
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
  `specific_skills_education` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `quarterly_meeting_attended` date DEFAULT NULL,
  `volunteer_dinner_rsvp` tinyint(1) DEFAULT NULL,
  `dinner_guest` tinyint(1) DEFAULT NULL,
  `attended_quarterly_meeting` tinyint(1) DEFAULT NULL,
  `active_inactive` varchar(255) DEFAULT NULL,
  `activity_status` varchar(255) DEFAULT NULL,
  `ministry_group` varchar(255) DEFAULT NULL,
  `chaplains_assistant` varchar(255) DEFAULT NULL,
  `on_call_schedule` varchar(255) DEFAULT NULL,
  `on_call_status` tinyint(1) DEFAULT NULL,
  `birth_month` varchar(255) DEFAULT NULL,
  `ministry_orientation` date DEFAULT NULL,
  `vol_manual_number` int(255) DEFAULT NULL,
  `prea_training` date DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `hu6` varchar(255) DEFAULT NULL,
  `denomination` varchar(255) DEFAULT NULL,
  `devices_approved` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cell`
--
ALTER TABLE `cell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
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
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cell`
--
ALTER TABLE `cell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
