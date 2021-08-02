-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 04:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qal_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`) VALUES
(1, 'Prime Bank'),
(2, 'Islami Bank'),
(3, 'Premier Bank');

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE IF NOT EXISTS `branchs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `branch_type` int(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`id`, `name`, `address`, `contact_no`, `branch_type`, `status`) VALUES
(1, 'Head Office', 'Uttara Dhaka', NULL, 1, 0),
(2, 'Gazipur Plant', 'Sirirchala, Bagherbazar, Gazipur', '01711609145', 3, 0),
(3, 'Sherpur Plant', 'Jamunna, Shahjahanpur, Bogra', '01711609145', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_types`
--

CREATE TABLE IF NOT EXISTS `branch_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_types`
--

INSERT INTO `branch_types` (`id`, `name`, `status`) VALUES
(1, 'Head Office', 0),
(2, 'Sale Center', 0),
(3, 'Factory', 0),
(4, 'R & D Site', 0),
(5, 'Poultry Farm', 0),
(6, 'Fish Farm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `challans`
--

CREATE TABLE IF NOT EXISTS `challans` (
  `id` int(11) NOT NULL,
  `challan_no` varchar(255) DEFAULT NULL,
  `do_id` varchar(255) DEFAULT NULL,
  `tilapia_per_box` int(11) DEFAULT NULL,
  `tilapia_no_box` int(11) DEFAULT NULL,
  `tilapia_comp_per_box` int(11) DEFAULT NULL,
  `tilapia_comp_no_box` int(11) DEFAULT NULL,
  `pungas_per_box` int(11) DEFAULT NULL,
  `pungas_no_box` int(11) DEFAULT NULL,
  `pungas_comp_per_box` int(11) DEFAULT NULL,
  `pungas_comp_no_box` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challans`
--

INSERT INTO `challans` (`id`, `challan_no`, `do_id`, `tilapia_per_box`, `tilapia_no_box`, `tilapia_comp_per_box`, `tilapia_comp_no_box`, `pungas_per_box`, `pungas_no_box`, `pungas_comp_per_box`, `pungas_comp_no_box`, `date`, `userid`) VALUES
(1, 'SDC21040001', 'SDO21040001', 600, 35, 550, 19, NULL, NULL, NULL, NULL, '2021-04-13', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `zoneid` int(11) NOT NULL,
  `regionid` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `proprietor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `delivery_point` varchar(255) NOT NULL,
  `carriage_charge` double(10,2) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `zoneid`, `regionid`, `code`, `name`, `proprietor`, `address`, `mobile`, `delivery_point`, `carriage_charge`, `userid`, `status`) VALUES
(1, 4, 10, 'QALA1', 'S Alom Enterprise0001', 'Md.Shah Alam', 'Mataji Mohadebpur,Naogaon', 1717255095, 'Mohadebpur', 0.00, 2, 0),
(2, 4, 11, 'QALA2', 'Rafin Traders-00001', 'Md. Azizul Hakim', 'Bongram,Sathia,Pabna', 1761708304, 'Ataikula', 0.00, 2, 0),
(3, 4, 10, 'QALA3', 'Parila Talukder Poultry and Fish Feed', 'Muhammad Ali', 'Parila,Paba,Rajshahi', 1740942512, 'Parila', 0.00, 2, 0),
(4, 4, 11, 'QALA4', 'Fakir Agro Fisheries Japab-00001', 'Md.Farid Uddin', 'Mirzapur Bazar ,Sherpur,Bogura', 1712635895, 'Hatchery', 0.03, 2, 0),
(5, 4, 11, 'QALA5', 'AL-Haz Poultry and Fish Feed', 'Md.Shah Alom', 'Sabrul Bazar,Bogura', 1711359580, 'Hatchery', 0.03, 2, 0),
(6, 5, 8, 'QALA6', 'Boroitoli Fisheries', 'Hasam Uddin Ahmed', 'Boro ,Chokoria,Cox\'sbazar', 1819374678, 'Chakaria', 0.00, 2, 0),
(7, 5, 8, 'QALA7', 'Rajshahi Fish Feed', 'Josim', 'Bagicharhat,Dohazari,Chiitagong', 1951064310, 'Kaptai Notun Rasta', 0.00, 2, 0),
(8, 9, 22, 'QALA8', 'Moutola Enterprise', 'Md.Jahangir Alom', 'Moutola,Kaligonj,Shathkhira', 1710175206, 'Moutola', 0.00, 2, 0),
(9, 6, 12, 'QALA9', 'Bhai Bhai Enterprise-32', 'Abdullah', 'Ferjali,Monipur,Gazipur', 1740856674, 'Monipur', 0.00, 2, 0),
(10, 6, 12, 'QALA10', 'A M Traders', 'Siddique Member', 'Khalia koir Khilpara', 1711970432, 'Gazipur', 0.00, 2, 0),
(11, 7, 15, 'QALA11', 'Istiak Poultry', 'Md Jashim Uddin', 'Charfasion,Bhola', 1715647938, 'Charfasion', 0.00, 2, 0),
(12, 7, 15, 'QALA12', 'Lalmohon SS Traders', 'S,Kamal', 'Lalmohon .Bhola', 1777326916, 'Lalmohon', 0.00, 2, 0),
(13, 7, 15, 'QALA13', 'Sarder Poultry', 'Md. Halim Sarder', 'Batajor Bondor,Gournadi,Barishal', 1740989251, 'Batajor', 0.00, 2, 0),
(14, 3, 7, 'QALA14', 'Tazbiha Enterprise', 'Md.Alamin Mia/Didarul Islam', 'Ashugonj,Suhillpur,B-Baria', 1736548272, 'Ashugonj', 0.00, 2, 0),
(15, 8, 19, 'QALA15', 'Latif Traders 01', 'Md.Abdul Latif', 'Atpukur hat,Fulbari,Dinajpur', 1713798363, 'Atpukur hat', 0.00, 2, 0),
(16, 6, 12, 'QALA16', 'Shakil Mothso khamar', 'Abdur Rouf', 'Bowali,Kaliakoir', 1725113951, 'Kaliakoir', 0.00, 2, 0),
(17, 1, 3, 'QALA17', 'Chacha Vatija Fish Feeds', 'Md.Abul Hashem', 'Nabinogor,Sadar,Sherpur', 1716500164, 'Nabinogor', 0.00, 2, 0),
(18, 6, 12, 'QALA18', 'Madina Poultry & Fish Feed-0003', 'Md. Anower Hossen', 'Bhuapur Bus Stant, Tangail', 1711786974, 'Bhuapur', 0.00, 2, 0),
(19, 1, 2, 'QALA19', 'Afridi Enterprise', 'Md.Abdul Hai', 'Keshorgonj,Fulbaria,Mymensingh', 1711511326, 'Keshogonj', 0.00, 2, 0),
(20, 4, 11, 'QALA20', 'Zihad Traders', 'Md.Zahidul Islam', 'Birgram,Shajahanpur,Bogura', 1718785175, 'Hatchery', 0.02, 2, 0),
(21, 4, 11, 'QALA21', 'Dihan Traders-0001', 'Md.Shaidul Islam Badol & Md.Rezaul Karim', 'Vulsum,Kahalu,Bogura', 1712323937, 'Vulsum', 0.00, 2, 0),
(22, 6, 12, 'QALA22', 'Shikder Mathsaya Khamar Poultry', 'Golam Towfiq Gorman', 'Kawaltia,Gazipur', 1629934593, 'Kawaltia', 0.00, 2, 0),
(23, 6, 12, 'QALA23', 'Shahin Enterprise-02', 'Md.Shahin Alon', 'Kawaltia,Gazipur', 1625854228, 'Kawaltia', 0.00, 2, 0),
(24, 8, 19, 'QALA24', 'R R and Sons Traders-0002', 'Md.Ripon Miah', 'Ghoraghata,Gaibanda,Dinajpur', 1713724780, 'Gaibanda', 0.00, 2, 0),
(25, 8, 19, 'QALA25', 'Nurul Traders-0001', 'Md,Nurul Islam', 'Kaligonj,Velabaria,Lalmonirhat', 1788174662, 'Velabaria', 0.00, 2, 0),
(26, 8, 18, 'QALA26', 'Rajarhat Traders', 'Md. Hamidul Islam', 'Rajarhat,Borovita,Kurigram', 1713773120, 'Borovita', 0.00, 2, 0),
(27, 1, 3, 'QALA27', 'Shifa Enterprise-00001', 'Md.Firoz Mia', 'Kalibaribazar,Muktagasa,Munshipara,Mymensingh', 1713536228, 'Munshipara', 0.00, 2, 0),
(28, 2, 4, 'QALA28', 'Jinnat Enterprise', 'Md.Jakir Hossain', 'Kadutibazar,Chandina,Cumilla', 1815546762, 'Kaduti', 0.00, 2, 0),
(29, 2, 4, 'QALA29', 'Krisnopur Enterprise', 'Md.Jahirul Islam', 'Nimsar,Burichong Cumilla', 1819131831, 'Nimsar', 0.00, 2, 0),
(30, 4, 11, 'QALA30', 'Abadpukur Rakib Traders', 'Md. Saiful Islam', 'Abadpukur,Adomdhighi,Bogra', 171870899, 'Abadpukur', 0.00, 2, 0),
(31, 4, 11, 'QALA31', 'Gokul Poultry and Fish Feed', 'Md, Azizar Rahman (Mister', 'Mahasthan,Shibgonj,Bogra', 176740373, 'Bogura/Hatchery', 0.00, 2, 0),
(32, 6, 12, 'QALA32', 'A D Poultry', 'Md.Ershadul Hoque Musulli', 'Bawalmirjapur', 1733196737, 'Bawalmirjapur', 0.00, 2, 0),
(33, 9, 21, 'QALA33', 'Bhuyan Enterprise', 'Jan Mohammad', 'Dakbangla,Jhenaidah', 176629424, 'Dakbangla', 0.00, 2, 0),
(34, 3, 6, 'QALA34', 'Nokshe Bangla Enterprise', 'Jasim Uddin', 'Paglabazar Sunamgonj', 1711913418, 'Paglabazar', 0.00, 2, 0),
(35, 5, 8, 'QALA35', 'Baijid Poultry & Fish Feed  Center 0001', 'Babul Ahmaed', 'South Nonerchari  Chakaria  Coxbazar', 1640658587, 'Chakaria  Coxbazar', 0.00, 2, 0),
(36, 5, 9, 'QALA36', 'Munshirhat Poultry', 'Md.Saiful Islam Mazumder', 'Fulgazi, Feni', 1817051073, 'Fulgazi .', 0.00, 2, 0),
(37, 8, 19, 'QALA37', 'Amran And Sons jaran01', 'Md.Amran', 'Thanamore,Joldhaka,Nilphamari', 1983250321, 'Joldhaka', 0.00, 2, 0),
(38, 3, 6, 'QALA38', 'Chairman Sir (Project-01)', 'M.Kaiser Rahman', 'Moulvibazar,', 1713007879, 'Moulvibazar', 0.00, 2, 0),
(39, 3, 6, 'QALA39', 'Juri Valley Fish Feed', 'Md.Jomir Ali', 'Juri,Moulvibazar', 1711449493, 'Juri', 0.00, 2, 0),
(40, 3, 7, 'QALA40', 'Mega Sharif Enterprise', 'Md. Kamal Uddin', 'Kosba,B-Baria', 1713629008, 'Kosba', 0.00, 2, 0),
(41, 1, 2, 'QALA41', 'Sherin Enterprise', 'Md.Abdul Matin', 'Fulbaria,Mymensingh', 1713530558, 'Fulbaria.', 0.00, 2, 0),
(42, 4, 11, 'QALA42', 'S.A Medical Store', 'Shohid Mostofa Somor', 'Namajghar,Bogura Sadar', 1711441078, 'Hatchery', 0.02, 2, 0),
(43, 4, 11, 'QALA43', 'K & Rihad Traders', 'Md.Zohurul Islam', 'Mirzapur Bazar,Sherpur,Bogura', 1713717151, 'Hatchery', 0.03, 2, 0),
(44, 4, 10, 'QALA44', 'New Belal Fish Feed', 'Md. Belal Uddin', 'Muslemer Mor, Paba, Rajshahi', 1718184034, 'Muslemer Mor.', 0.00, 2, 0),
(45, 8, 18, 'QALA45', 'R R and Sons Traders-0002', 'Md. Ripon Miah', 'Ghoraghat,Gaibanda,Dinajpur', 1713724780, 'Gaibanda', 0.00, 2, 0),
(46, 8, 18, 'QALA46', 'Nurul Traders-0001', 'Md. Nurul Islam', 'Kaligonj, Velabari,Lalmonirhat', 1788174662, 'Velabari', 0.00, 2, 0),
(47, 6, 12, 'QALA47', 'Abbas Uddin Enterprise', 'Md Abbas Uddin', 'Chabagan,Gazipur', 1718923559, 'Chabagan', 0.00, 2, 0),
(48, 3, 6, 'QALA48', 'Rifath Poultry Farm-0003', 'Md.Samad Miah', 'Doarabazar ,Sunamgonj', 1790314991, 'Doarabazar', 0.00, 2, 0),
(49, 2, 4, 'QALA49', 'Forid Traders', 'Md. Kazi Farid Uddin', 'Raipur,Daudkandi,Cumilla', 1815404011, 'Raipur.', 0.00, 2, 0),
(50, 2, 4, 'QALA50', 'Liza poultry', 'Md. Shaheen Sarwar', 'Companigonj,Muradnagar,cumilla', 1713604247, 'Companigonj .', 0.00, 2, 0),
(51, 4, 11, 'QALA51', 'Shulov Poultry', 'Md. Barkot Ali Mia', 'Poilanpur,Sadar,Pabna', 1712177133, 'Hatchery/Poilanpur', 0.06, 2, 0),
(52, 3, 7, 'QALA52', 'Babul Traders 0003', 'Md.Baizid Ahmed', 'Akhaura,B-Baria', 1710220145, 'Akhaura', 0.00, 2, 0),
(53, 7, 17, 'QALA53', 'Nodi Mostsho Vandar 0001', 'Md. Zia Biswas', 'Komoleshordi,, Boalmari, Faridpur', 1713823999, 'Komoleshordi,, Boalmari.', 0.00, 2, 0),
(54, 7, 15, 'QALA54', 'Khan Enterprise0006', 'Md.Anower Hossen', 'Bakergonj,Kaligonj', 1719748577, 'Kaligonj', 0.00, 2, 0),
(55, 7, 17, 'QALA55', 'Sornali  Enterprise 0002', 'Md. Iqbal Mahmud', 'Garda, Faridpur Sadar, Faridpur', 1799175034, 'Garda .', 0.00, 2, 0),
(56, 7, 16, 'QALA56', 'Moon Fish and Poultry Feed 0003', 'Md. Mesba uddin', 'Arua kongshur, Gopalganj sadar', 1724528271, 'Gopalganj', 0.00, 2, 0),
(57, 5, 9, 'QALA57', 'Sheikh Farid Matshay  Prokolpo 00001', 'Sheikh Farid', 'Azampur, Mirershorai, Ctg.', 1817776089, 'Mohuripriject', 0.00, 2, 0),
(58, 2, 4, 'QALA58', 'Shaharia poultry', 'Md. Shahriar Ahmed', 'Katherpul,Chandina,Barura,Cumilla', 1720522019, 'Katherpul,Chandina', 0.00, 2, 0),
(59, 6, 12, 'QALA59', 'Abdullah Enterptrise', 'Md.Abdullah', 'Alenga,Tangail', 1307957305, 'Alenga', 0.00, 2, 0),
(60, 6, 12, 'QALA60', 'Satata Poultry', 'Montu', 'Gopalpur,Tangail', 1712187248, 'Gopalpur', 0.00, 2, 0),
(61, 4, 10, 'QALA61', 'Three Star Poultry 0002', 'Md. Arif Hossain', 'Baya, Paba, Rajshahi', 1711715139, 'Baya,', 0.00, 2, 0),
(62, 3, 7, 'QALA62', 'Krishighor Agro Complex', 'Ali Haider Tushar', 'Konda,Sarail,B-Baria', 1712611388, 'Sarail', 0.00, 2, 0),
(63, 3, 7, 'QALA63', 'Kamal Traders 0003', 'Md. Kamal Uddin', 'Ashugonj,B-Baria', 1713607372, 'Ashugonj', 0.00, 2, 0),
(64, 3, 7, 'QALA64', 'Tajbiha Entrprise 0001', 'Md.Al-Amin', 'Suhilpur,Sadar, B-Baria', 1736548272, 'Suhilpur', 0.00, 2, 0),
(65, 5, 9, 'QALA65', 'Bismillah Fisheries and Poultry  Feed 00009', 'Md .Rafique Chowdhori', 'Kalapara, Porshuram, Feni', 1815435512, 'Porshuram', 0.00, 2, 0),
(66, 5, 9, 'QALA66', 'Nasiruddin Fish Feed', 'Md Foisal', 'Sebarhat,Sekandarpur,Dagonbhuyan,Fani', 1712240118, 'Sebarhat', 0.00, 2, 0),
(67, 5, 9, 'QALA67', 'Anwar Traders 002', 'Md Anower', 'Boshurhat,Companigonj,Noakhali', 1839978785, 'Companigonj', 0.00, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE IF NOT EXISTS `delivery_orders` (
  `id` int(11) NOT NULL,
  `auto_no` varchar(11) NOT NULL DEFAULT '0000',
  `delivery_order_no` varchar(40) NOT NULL,
  `zoneid` int(11) NOT NULL,
  `regionid` int(11) DEFAULT NULL,
  `custid` int(11) NOT NULL,
  `do_date` date NOT NULL,
  `hybrid_monosex_tilapia_qty` int(11) DEFAULT 0,
  `tilapia_complementary_qty` int(11) DEFAULT 0,
  `hybrid_monosex_pungas_qty` int(11) DEFAULT 0,
  `pungas_complementary_qty` int(11) DEFAULT 0,
  `pungas_special_qty` int(11) DEFAULT 0,
  `pungas_mortality_qty` int(11) DEFAULT 0,
  `tilapia_special_qty` int(11) DEFAULT 0,
  `tilapia_mortality_qty` int(11) DEFAULT 0,
  `incentive_tilapia_qty` int(11) DEFAULT 0,
  `incentive_tilapia_note` varchar(255) DEFAULT NULL,
  `incentive_pungas_qty` int(11) DEFAULT 0,
  `incentive_pungas_note` varchar(255) DEFAULT NULL,
  `delivery_charge` enum('Yes','No') DEFAULT 'No',
  `userid` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`id`, `auto_no`, `delivery_order_no`, `zoneid`, `regionid`, `custid`, `do_date`, `hybrid_monosex_tilapia_qty`, `tilapia_complementary_qty`, `hybrid_monosex_pungas_qty`, `pungas_complementary_qty`, `pungas_special_qty`, `pungas_mortality_qty`, `tilapia_special_qty`, `tilapia_mortality_qty`, `incentive_tilapia_qty`, `incentive_tilapia_note`, `incentive_pungas_qty`, `incentive_pungas_note`, `delivery_charge`, `userid`, `created_at`, `updated_at`, `status`) VALUES
(1, '0000', 'SDO21040001', 4, 10, 1, '2021-04-13', 500000, 25000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, '2021-04-13 04:42:02', NULL, 0),
(2, '0000', 'SDO21040002', 4, 10, 61, '2021-04-13', 30000, 1500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, '2021-04-13 04:42:40', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE IF NOT EXISTS `gate_pass` (
  `id` int(11) NOT NULL,
  `gp_no` varchar(255) DEFAULT NULL,
  `doid` varchar(255) NOT NULL,
  `agentid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `following_item` varchar(255) DEFAULT NULL,
  `particulars_items` varchar(255) DEFAULT NULL,
  `items_qty` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gate_pass`
--

INSERT INTO `gate_pass` (`id`, `gp_no`, `doid`, `agentid`, `date`, `following_item`, `particulars_items`, `items_qty`, `userid`, `status`) VALUES
(1, 'SGP21040001', 'SDO21040001', 1, '2021-04-13', 'Tilapia', 'Tilapia', 1000000, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `challan_id` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `challan_id`, `date`, `userid`, `created_at`, `updated_at`, `status`) VALUES
(1, 'BIL21040002', 'SDC21040001', '2021-04-13', 5, '2021-04-13 06:00:29', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `money_receipts`
--

CREATE TABLE IF NOT EXISTS `money_receipts` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `custid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `added_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money_receipts`
--

INSERT INTO `money_receipts` (`id`, `serial_no`, `custid`, `amount`, `bank_id`, `note`, `added_date`, `created_at`, `userid`) VALUES
(1, 'AMR21040001', 61, 100, 1, 'Fry Sales', '2021-04-14', '2021-04-13 04:45:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `status`) VALUES
(1, '14 & 15 th Plant, Shrimp Feed, Nandigram', ''),
(3, 'VC/2016/010 [14-15th Shrimp Plant]', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_budgets`
--

CREATE TABLE IF NOT EXISTS `project_budgets` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `memo_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `project_amount` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 0 COMMENT '0=Active,1=Inactive,',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_budgets`
--

INSERT INTO `project_budgets` (`id`, `projectid`, `memo_no`, `date`, `project_amount`, `status`) VALUES
(3, 1, 'VC/2016/009 [Layer Plants]', '2021-07-09', 52000, 0),
(4, 3, 'VC/2016/011 [UPS BP & GP]', '2021-07-09', 4500000, 0),
(5, 1, 'VC/2016/010 [14-15th Shrimp Plant]', '2021-07-09', 25800000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_general_items`
--

CREATE TABLE IF NOT EXISTS `purchase_general_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemgroup_id` int(11) DEFAULT NULL,
  `itemsubgroup_id` int(11) DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_unit_id` int(11) DEFAULT NULL,
  `item_alternative_unit_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `where_unit` varchar(10) DEFAULT NULL,
  `where_kg` varchar(10) DEFAULT NULL,
  `inventory_type` varchar(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_general_items`
--

INSERT INTO `purchase_general_items` (`id`, `itemgroup_id`, `itemsubgroup_id`, `item_category_id`, `item_unit_id`, `item_alternative_unit_id`, `item_name`, `item_description`, `item_code`, `where_unit`, `where_kg`, `inventory_type`, `userid`, `status`) VALUES
(12, 12, 12, 12, 2, NULL, 'Computer', 'Tset', 'As2021', 'Pcs', NULL, NULL, 5, 0),
(13, 13, 13, 13, 2, NULL, 'Stand Fan', 'test test', 'AS2021', 'pse', NULL, '3', 5, 0),
(14, 15, 9, 10, 2, 2, '2 Pin Socket', 'Electrical', 'AS080236', 'pcs', NULL, '5', 5, 0),
(15, 16, 10, 11, 2, 2, '2 Pin Socket (Ceramics)', 'Electrical', 'CN080242', 'pcs', NULL, '5', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE IF NOT EXISTS `purchase_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item_categories`
--

CREATE TABLE IF NOT EXISTS `purchase_item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `subgroup_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item_categories`
--

INSERT INTO `purchase_item_categories` (`id`, `group_id`, `subgroup_id`, `name`, `status`) VALUES
(9, 15, 8, 'AS08 Electrical Items', 0),
(10, 15, 9, 'Electrical Items', 0),
(11, 16, 10, 'CN08 Electrical Items', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item_groups`
--

CREATE TABLE IF NOT EXISTS `purchase_item_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `authorized_group` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item_groups`
--

INSERT INTO `purchase_item_groups` (`id`, `name`, `authorized_group`, `status`) VALUES
(15, 'ASSETS', '4', 0),
(16, 'Consumables, Maintenances & RM', '4', 0),
(17, 'Marketing & Vehicle', '3', 0),
(18, 'Raw Materials', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item_subgroups`
--

CREATE TABLE IF NOT EXISTS `purchase_item_subgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item_subgroups`
--

INSERT INTO `purchase_item_subgroups` (`id`, `group_id`, `name`, `status`) VALUES
(8, 15, 'Load cell for oil Seale', 0),
(9, 15, 'Pin Socket', 0),
(10, 16, '2 Pin Socket (Ceramics)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item_units`
--

CREATE TABLE IF NOT EXISTS `purchase_item_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_item_units`
--

INSERT INTO `purchase_item_units` (`id`, `unit`, `status`) VALUES
(1, 'KG', 0),
(2, 'Pcs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pack_sizes`
--

CREATE TABLE IF NOT EXISTS `purchase_pack_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_pack_sizes`
--

INSERT INTO `purchase_pack_sizes` (`id`, `name`, `status`) VALUES
(1, 'Bag', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `zoneid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `zoneid`, `status`, `userid`) VALUES
(1, 'Shambugonj', 1, 0, NULL),
(2, 'Trishal', 1, 0, NULL),
(3, 'Jamalpur', 1, 0, NULL),
(4, 'Comilla', 2, 0, NULL),
(5, 'Chandpur', 2, 0, NULL),
(6, 'Sylhet', 3, 0, NULL),
(7, 'B-Baria', 3, 0, NULL),
(8, 'Chittagong', 5, 0, NULL),
(9, 'Noakhali', 5, 0, NULL),
(10, 'Rajshahi', 4, 0, NULL),
(11, 'Pabna', 4, 0, NULL),
(12, 'Gazipur', 6, 0, NULL),
(13, 'Narsingdi', 6, 0, NULL),
(14, 'Dhaka', 6, 0, NULL),
(15, 'Barishal', 7, 0, NULL),
(16, 'Takerhat', 7, 0, NULL),
(17, 'Faridpur', 7, 0, NULL),
(18, 'Rangpur', 8, 0, NULL),
(19, 'Dinajpur', 8, 0, NULL),
(20, 'Jashore', 9, 0, NULL),
(21, 'Jhenaidah', 9, 0, NULL),
(22, 'Khulna', 9, 0, NULL),
(23, 'Joypurhat', 8, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE IF NOT EXISTS `requisitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postingDate` date NOT NULL,
  `requiredDate` date NOT NULL,
  `branch_id` varchar(191) DEFAULT NULL,
  `memo_no` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_group` int(11) DEFAULT NULL,
  `priority` varchar(191) DEFAULT NULL,
  `procuerementType` varchar(191) DEFAULT NULL,
  `item_name` varchar(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `required_quantity` int(11) DEFAULT NULL,
  `status` tinytext DEFAULT '0',
  `created_by` varchar(191) NOT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `approved_by` varchar(171) DEFAULT NULL,
  `OrderConfirm_by` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `postingDate`, `requiredDate`, `branch_id`, `memo_no`, `description`, `item_group`, `priority`, `procuerementType`, `item_name`, `unit`, `required_quantity`, `status`, `created_by`, `updated_by`, `approved_by`, `OrderConfirm_by`) VALUES
(1, '2021-07-18', '2021-07-18', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(2, '2021-07-18', '2021-07-18', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(3, '2021-07-18', '2021-07-18', NULL, NULL, NULL, 16, 'Regular', 'By Workorder', '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(4, '2021-07-18', '2021-07-18', '1', 3, NULL, 16, 'Occational', 'By Workorder', '15', 0, 0, NULL, '5', NULL, NULL, NULL),
(5, '2021-07-18', '2021-07-18', '1', 3, NULL, 16, 'Occational', 'By Workorder', '15', 0, 0, NULL, '5', NULL, NULL, NULL),
(6, '2021-07-18', '2021-07-18', '1', 4, 'zdfdsg', 16, 'Occational', 'By Workorder', '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(7, '2021-07-18', '2021-07-18', '1', 5, 'fsdfdsd', 16, 'Emergency', 'By Workorder', '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(8, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Regular', 'By Workorder', '0', 0, 0, NULL, '5', NULL, NULL, NULL),
(9, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(10, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(11, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(12, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(13, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(14, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL),
(15, '2021-07-18', '2021-07-18', '1', 4, NULL, 15, 'Occational', 'By Workorder', NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_items`
--

CREATE TABLE IF NOT EXISTS `requisition_items` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Admin','User','Factory') COLLATE utf8mb4_unicode_ci DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Md. Masud Rana (User)', 'md.masud@qfl.com.bd', NULL, '$2y$10$ADRBFsEBUTlIHvviPJTgnOtXGJ4Ezl8VK76DCazzBW.qesnCPBn.W', 'zNk4Xq9r9tSAN9EV1t9fQLoUJgwRs3H2xobEUbO3p7j8wF91AMYYDNrP2FqR', 'User', '2021-02-22 08:11:50', '2021-02-22 08:11:50'),
(2, 'Md. Rubel Rana Chowdhury', 'qalrubel@gmail.com', NULL, '$2y$10$xXIWwHYXqLjoqPGqvhphlOE6ra1c6VTjgAV9FQ7wg5NekvCTfeUpS', 'bxPUsdVJRYsr9xU8eRYM60vZXfC8IwixueUjXfXsaPq6DbKhDMNRf7uSUXye', 'User', '2021-03-22 01:13:58', '2021-03-08 01:13:58'),
(4, 'QAL Factory', 'factory@qfl.com.bd', NULL, '$2y$10$ADRBFsEBUTlIHvviPJTgnOtXGJ4Ezl8VK76DCazzBW.qesnCPBn.W', 'x2mN2XVNIJ7LNM0SU5VYlt2gekyRK9fMXxw2unmxxrZc6YIYtv7Ob9lU6ebN', 'Factory', '2021-02-22 08:11:50', '2021-02-22 08:11:50'),
(5, 'Md. Masud Rana (Admin)', 'admin@qfl.com.bd', NULL, '$2y$10$ADRBFsEBUTlIHvviPJTgnOtXGJ4Ezl8VK76DCazzBW.qesnCPBn.W', 'bFl4dKT0yRpW6ZC8FXzyMcCaRJNQanol0R4BZFrTxVYddmwaYSKgCUudGr9H', 'Admin', '2021-02-22 08:11:50', '2021-02-22 08:11:50'),
(6, '', '', NULL, '', NULL, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `code`, `name`, `status`) VALUES
(1, 'Z01', 'Brahmaputra', 0),
(2, 'Z02', 'Megna', 0),
(3, 'Z03', 'Surma', 0),
(4, 'Z04', 'Jamuna', 0),
(5, 'Z05', 'Karnapuli', 0),
(6, 'Z06', 'Buriganga', 0),
(7, 'Z07', 'Padma', 0),
(8, 'Z08', 'Tista', 0),
(9, 'Z09', 'Rupsha', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
