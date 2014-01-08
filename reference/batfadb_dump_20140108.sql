-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2014 at 11:22 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `batfadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `batdes_cells`
--

CREATE TABLE IF NOT EXISTS `batdes_cells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_nom` double DEFAULT NULL,
  `v_max` double DEFAULT NULL,
  `v_min` double DEFAULT NULL,
  `ah_nom` double DEFAULT NULL,
  `ah_min` double DEFAULT NULL,
  `ah_max` double DEFAULT NULL,
  `dim_x` double DEFAULT NULL,
  `dim_y` double DEFAULT NULL,
  `dim_z` double DEFAULT NULL,
  `manf` varchar(200) DEFAULT NULL,
  `formfactor` varchar(200) DEFAULT NULL,
  `i_dis_cont` double DEFAULT NULL,
  `i_dis_pulse` double DEFAULT NULL,
  `i_dis_pulse_dur` double DEFAULT NULL,
  `i_chg_cont` double DEFAULT NULL,
  `i_chg_pulse` double DEFAULT NULL,
  `i_chg_pulse_dur` double DEFAULT NULL,
  `chemistry` varchar(200) DEFAULT NULL,
  `iec62133-1cert` tinyint(1) DEFAULT '0',
  `iec62133-2cert` tinyint(1) DEFAULT '0',
  `datasheet_url1` varchar(200) DEFAULT NULL,
  `datasheet_url2` varchar(200) DEFAULT NULL,
  `nrnd` tinyint(1) DEFAULT '0',
  `temp_op_max` double DEFAULT NULL,
  `temp_op_min` double DEFAULT NULL,
  `temp_st_max` double DEFAULT NULL,
  `temp_st_min` double DEFAULT NULL,
  `temp_ah_curve` varchar(200) DEFAULT NULL,
  `temp_v_curve` varchar(200) DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `batdes_cells`
--

INSERT INTO `batdes_cells` (`id`, `v_nom`, `v_max`, `v_min`, `ah_nom`, `ah_min`, `ah_max`, `dim_x`, `dim_y`, `dim_z`, `manf`, `formfactor`, `i_dis_cont`, `i_dis_pulse`, `i_dis_pulse_dur`, `i_chg_cont`, `i_chg_pulse`, `i_chg_pulse_dur`, `chemistry`, `iec62133-1cert`, `iec62133-2cert`, `datasheet_url1`, `datasheet_url2`, `nrnd`, `temp_op_max`, `temp_op_min`, `temp_st_max`, `temp_st_min`, `temp_ah_curve`, `temp_v_curve`, `date_modified`) VALUES
(1, 3.7, 4.2, 2.75, 2410, 2340, 2410, 2.8, 65, 114, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(2, 3.7, 4.2, 2.75, 1600, 1550, 1600, 3.2, 49, 94, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(3, 3.7, 4.2, 2.75, 1800, 1720, 1800, 3.3, 64, 89, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(4, 3.7, 4.2, 2.75, 2400, 2310, 2400, 3.5, 67, 90, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(5, 3.7, 4.2, 2.75, 1350, 1300, 1350, 3.8, 52, 69, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(6, 3.7, 4.2, 2.75, 4000, 3880, 4000, 3.9, 76, 108, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(7, 3.7, 4.2, 2.75, 2380, 2300, 2380, 4.1, 78, 63, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(8, 3.7, 4.2, 2.75, 2030, 1970, 2030, 4.2, 44, 97, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(9, 3.7, 4.2, 2.75, 3300, 3180, 3300, 4.2, 56, 120, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(10, 3.7, 4.2, 2.75, 3730, 3610, 3730, 4.2, 61, 123, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(11, 3.7, 4.2, 2.75, 1500, 1450, 1500, 4.5, 42, 61, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(12, 3.7, 4.2, 2.75, 3400, 3280, 3400, 4.7, 67, 90, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(13, 3.7, 4.2, 2.75, 3710, 3600, 3710, 5.1, 81, 75, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(14, 3.7, 4.2, 2.75, 2250, 2150, 2250, 5.7, 41, 99, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(15, 3.7, 4.2, 2.75, 2200, 2100, 2200, 6, 48, 68, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(16, 3.7, 4.2, 2.75, 2820, 2700, 2820, 6.1, 44, 96, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(17, 3.7, 4.2, 2.75, 4220, 4090, 4220, 6.1, 65, 85, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(18, 3.7, 4.2, 2.75, 4100, 3950, 4100, 6.1, 67, 89, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(19, 3.7, 4.2, 2.75, 5000, 4850, 5000, 6.5, 67, 90, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(20, 3.7, 4.2, 2.75, 2900, 2780, 2900, 6.7, 37, 91, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(21, 3.7, 4.2, 2.75, 3300, 3170, 3300, 8.6, 65, 261, 'Panasonic', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(22, 3.7, 4.2, 2.75, 890, 850, 890, 7.5, 28, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(23, 3.7, 4.2, 2.75, 960, 920, 960, 6.5, 30, 39, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(24, 3.7, 4.2, 2.75, 750, 720, 750, 4.6, 30, 48, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(25, 3.7, 4.2, 2.75, 930, 900, 930, 5.5, 30, 48, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(26, 3.7, 4.2, 2.75, 740, 700, 740, 5.8, 31, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(27, 3.7, 4.2, 2.75, 1090, 1050, 1090, 7, 31, 41, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(28, 3.7, 4.2, 2.75, 700, 670, 700, 5, 34, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(29, 3.7, 4.2, 2.75, 830, 800, 830, 5.5, 34, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(30, 3.7, 4.2, 2.75, 930, 900, 930, 6.5, 34, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(31, 3.7, 4.2, 2.75, 980, 950, 980, 6.6, 34, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(32, 3.7, 4.2, 2.75, 850, 820, 850, 4.6, 34, 43, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(33, 3.7, 4.2, 2.75, 1040, 1000, 1040, 5.5, 34, 43, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(34, 3.7, 4.2, 2.75, 870, 840, 870, 4.6, 34, 46, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(35, 3.7, 4.2, 2.75, 1080, 1030, 1080, 5.5, 34, 46, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(36, 3.7, 4.2, 2.75, 960, 920, 960, 4.6, 34, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(37, 3.7, 4.2, 2.75, 1200, 1150, 1200, 5.5, 34, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(38, 3.7, 4.2, 2.75, 1300, 1250, 1300, 6.5, 34, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(39, 3.7, 4.2, 2.75, 1480, 1430, 1480, 7, 34, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(40, 3.7, 4.2, 2.75, 2000, 1880, 2000, 10, 34, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(41, 3.7, 4.2, 2.75, 920, 880, 920, 5.9, 35, 36, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(42, 3.7, 4.2, 2.75, 680, 650, 680, 3.8, 35, 43, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(43, 3.7, 4.2, 2.75, 850, 820, 850, 3.8, 35, 51, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(44, 3.7, 4.2, 2.75, 950, 900, 950, 5.3, 36, 40, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(45, 3.7, 4.2, 2.75, 730, 700, 730, 4.2, 36, 43, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(46, 3.7, 4.2, 2.75, 1060, 1020, 1060, 4.6, 36, 51, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(47, 3.7, 4.2, 2.75, 1450, 1400, 1450, 6.1, 37, 56, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(48, 3.7, 4.2, 2.75, 1290, 1240, 1290, 4.9, 38, 56, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(49, 3.7, 4.2, 2.75, 1170, 1130, 1170, 4.3, 38, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(50, 3.7, 4.2, 2.75, 1420, 1380, 1420, 5, 38, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(51, 3.7, 4.2, 2.75, 2100, 2040, 2100, 6.5, 38, 64, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(52, 3.7, 4.2, 2.75, 1050, 1010, 1050, 5.5, 39, 39, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(53, 3.7, 4.2, 2.75, 1270, 1230, 1270, 6.3, 40, 42, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(54, 3.7, 4.2, 2.75, 1260, 1220, 1260, 5.1, 40, 50, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(55, 3.7, 4.2, 2.75, 1060, 1020, 1060, 4, 42, 51, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(56, 3.7, 4.2, 2.75, 1350, 1300, 1350, 4.2, 42, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(57, 3.7, 4.2, 2.75, 1420, 1370, 1420, 5.6, 44, 47, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(58, 3.7, 4.2, 2.75, 1580, 1520, 1580, 6.2, 44, 47, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(59, 3.7, 4.2, 2.75, 1450, 1390, 1450, 4.6, 44, 59, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(60, 3.7, 4.2, 2.75, 1280, 1230, 1280, 3.8, 44, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(61, 3.7, 4.2, 2.75, 1520, 1460, 1520, 4.6, 44, 62, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(62, 3.7, 4.2, 2.75, 1590, 1530, 1590, 4.8, 44, 62, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(63, 3.7, 4.2, 2.75, 1860, 1800, 1860, 5.3, 44, 62, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(64, 3.7, 4.2, 2.75, 1290, 1240, 1290, 5, 45, 47, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(65, 3.7, 4.2, 2.75, 1510, 1460, 1510, 5, 45, 53, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(66, 3.7, 4.2, 2.75, 1580, 1520, 1580, 5.3, 45, 53, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(67, 3.7, 4.2, 2.75, 1960, 1900, 1960, 6.4, 45, 53, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(68, 3.7, 4.2, 2.75, 1730, 1670, 1730, 5.1, 46, 57, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(69, 3.7, 4.2, 2.75, 1450, 1400, 1450, 3.8, 49, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(70, 3.7, 4.2, 2.75, 1860, 1800, 1860, 4.9, 49, 61, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(71, 3.7, 4.2, 2.75, 1570, 1520, 1570, 5.1, 51, 48, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(72, 3.7, 4.2, 2.75, 1710, 1660, 1710, 4.8, 51, 55, 'Panasonic', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(73, 3.7, 4.2, 2.75, 5000, 5000, 5000, 5.9, 107, 102, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(74, 3.7, 4.2, 2.75, 10000, 10000, 10000, 10, 107, 103, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(75, 3.7, 4.2, 2.75, 100000, 100000, 100000, 7, 455, 325, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(76, 3.7, 4.2, 2.75, 350, 350, 350, 2.9, 34, 52.5, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(77, 3.7, 4.2, 2.75, 400, 400, 400, 5, 34, 35, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(78, 3.7, 4.2, 2.75, 740, 740, 740, 5.2, 34, 59, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(79, 3.7, 4.2, 2.75, 1500, 1500, 1500, 7.4, 38, 70.5, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(80, 3.7, 4.2, 2.75, 1500, 1500, 1500, 6.5, 34, 96, 'Dow Kokam', 'Pouch', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(81, 3.7, 4.2, 2.75, 700, 660, 700, 14, 43, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(82, 3.7, 4.2, 2.75, 530, 500, 530, 14, 43, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(83, 3.7, 4.2, 2.75, 840, 800, 840, 14, 50, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(84, 3.7, 4.2, 2.75, 710, 680, 710, 14, 50, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(85, 3.7, 4.2, 2.75, 710, 680, 710, 14, 50, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(86, 3.7, 4.2, 2.75, 980, 940, 980, 14, 65, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(87, 3.7, 4.2, 2.75, 1700, 1620, 1700, 18, 50, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(88, 3.7, 4.2, 2.75, 1520, 1450, 1520, 18, 50, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(89, 3.7, 4.2, 2.75, 1260, 1200, 1260, 18, 50, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(90, 3.7, 4.2, 2.75, 1400, 1300, 1400, 18, 50, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(91, 3.7, 4.2, 2.75, 2400, 2300, 2400, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(92, 3.7, 4.2, 2.75, 2600, 2450, 2600, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(93, 3.7, 4.2, 2.75, 2600, 2450, 2600, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(94, 3.7, 4.2, 2.75, 2050, 2000, 2050, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(95, 3.7, 4.2, 2.75, 2350, 2200, 2350, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(96, 3.7, 4.2, 2.75, 2250, 2100, 2250, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(97, 3.7, 4.2, 2.75, 2000, 1850, 2000, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(98, 3.7, 4.2, 2.75, 2250, 3200, 2250, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(99, 3.7, 4.2, 2.75, 3070, 2900, 3070, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(100, 3.7, 4.2, 2.75, 2900, 2700, 2900, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(101, 3.7, 4.2, 2.75, 2900, 2700, 2900, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(102, 3.7, 4.2, 2.75, 2700, 2500, 2700, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(103, 3.7, 4.2, 2.75, 2250, 2100, 2250, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(104, 3.7, 4.2, 2.75, 2000, 1860, 2000, 18, 50, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(105, 3.7, 4.2, 2.75, 750, 700, 750, 14, 40, 14, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(106, 3.7, 4.3, 3, 2200, 2100, 2200, 16, 65, 16, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(107, 3.7, 4.35, 3, 2500, 2330, 2500, 16, 65, 16, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(108, 3.7, 4.3, 3, 2800, 2650, 2800, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(109, 3.7, 4.35, 3, 3000, 2850, 3000, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(110, 3.7, 4.35, 3, 1200, 1100, 1200, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(111, 3.7, 4.35, 3, 1300, 1250, 1300, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(112, 3.7, 4.35, 3, 1350, 1250, 1350, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(113, 3.7, 4.35, 3, 1600, 1500, 1600, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(114, 3.7, 4.35, 3, 1600, 1500, 1600, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(115, 3.7, 4.35, 3, 2100, 2000, 2100, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(116, 3.7, 4.35, 3, 2050, 1950, 2050, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(117, 3.7, 4.35, 3, 1200, 1100, 1200, 18, 65, 18, 'Panasonic', 'Cylindrical', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(118, 3.7, 4.2, 3, 5300, 5300, 5300, 19.2, 65.2, 37.1, 'Boston Power', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL),
(119, 3.7, 4.2, 3, 5300, 5300, 5300, 19.2, 65.2, 37.1, 'Boston Power', 'Prismatic', 1, 1, 1, 1, 1, 1, 'NMC', 0, 0, NULL, NULL, 0, 40, 0, 60, -10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batdes_cus`
--

CREATE TABLE IF NOT EXISTS `batdes_cus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `as400_cusnum` varchar(200) DEFAULT NULL,
  `insidesales` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batdes_designs`
--

CREATE TABLE IF NOT EXISTS `batdes_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellid` int(11) DEFAULT NULL,
  `numpar` int(11) DEFAULT NULL,
  `numser` int(11) DEFAULT NULL,
  `protid` int(11) DEFAULT NULL,
  `protqty` int(11) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL,
  `quotenum` varchar(200) DEFAULT NULL,
  `notes` text,
  `date_created` date DEFAULT NULL,
  `num_x` int(11) DEFAULT NULL,
  `num_y` int(11) DEFAULT NULL,
  `num_z` int(11) DEFAULT NULL,
  `dim_x` double DEFAULT NULL,
  `dim_y` double DEFAULT NULL,
  `dim_z` double DEFAULT NULL,
  `energy` double DEFAULT NULL,
  `v_min` double DEFAULT NULL,
  `v_max` double DEFAULT NULL,
  `i_dis_cont` double DEFAULT NULL,
  `i_dis_pulse` double DEFAULT NULL,
  `i_dis_pulse_dur` double DEFAULT NULL,
  `i_chg_cont` double DEFAULT NULL,
  `i_chg_pulse` double DEFAULT NULL,
  `i_chg_pulse_dur` double DEFAULT NULL,
  `isvalid` tinyint(1) DEFAULT '0',
  `temp_op_max` double DEFAULT NULL,
  `temp_op_min` double DEFAULT NULL,
  `temp_st_max` double DEFAULT NULL,
  `temp_st_min` double DEFAULT NULL,
  `time_op_min` double DEFAULT NULL,
  `time_st_max` double DEFAULT NULL,
  `weight_max` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batdes_protectors`
--

CREATE TABLE IF NOT EXISTS `batdes_protectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manf` varchar(200) DEFAULT NULL,
  `numser` int(11) DEFAULT NULL,
  `cell_v_min` double DEFAULT NULL,
  `cell_v_max` double DEFAULT NULL,
  `i_cont` double DEFAULT NULL,
  `i_pulse` double DEFAULT NULL,
  `i_pulse_dur` double DEFAULT NULL,
  `dim_x` double DEFAULT NULL,
  `dim_y` double DEFAULT NULL,
  `dim_z` double DEFAULT NULL,
  `datasheet_url` varchar(200) DEFAULT NULL,
  `nrnd` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batfa_batteries`
--

CREATE TABLE IF NOT EXISTS `batfa_batteries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(200) DEFAULT NULL,
  `make` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `pcbsn` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `batfa_batteries`
--

INSERT INTO `batfa_batteries` (`id`, `sn`, `make`, `model`, `pcbsn`) VALUES
(1, 'AJ13BAS0157', 'Zoll', 'Surepower II', 'TF00BKH'),
(2, '78945655555', 'Zoll', 'AED Star', 'unknown'),
(3, '78945655555', 'Zoll', 'AED Star', 'unknown'),
(4, '78945655555', 'Zoll', 'AED Star', 'unknown'),
(5, '847773HHHG', 'Testco', 'Powershit', 'unknown'),
(6, '847773HHHG', 'Testco', 'Powershit', 'unknown'),
(7, '847773HHHG', 'Testco', 'Powershit', 'unknown'),
(8, '9786642768', 'Testco', 'Powershit', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `batfa_battypes`
--

CREATE TABLE IF NOT EXISTS `batfa_battypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(200) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `snregex` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batfa_faevents`
--

CREATE TABLE IF NOT EXISTS `batfa_faevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batfa_batteries_id` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `symptom` text,
  `symptom_date` date DEFAULT NULL,
  `diagnosis` text,
  `diagnosis_code` int(11) DEFAULT NULL,
  `diagnosis_date` date DEFAULT NULL,
  `diagnosed` tinyint(1) DEFAULT NULL,
  `diagnosis_user` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `batfa_faevents`
--

INSERT INTO `batfa_faevents` (`id`, `batfa_batteries_id`, `date_created`, `symptom`, `symptom_date`, `diagnosis`, `diagnosis_code`, `diagnosis_date`, `diagnosed`, `diagnosis_user`) VALUES
(1, 1, '2013-12-10', 'Red LED lights up when you press the button.', '2013-12-10', 'Micro needed to be reset. Battery needed to be reconditioned also.', 3, '2013-12-12', 1, 'Andy'),
(2, 1, '2013-12-13', 'Red LED is back on.', '2013-12-13', NULL, NULL, NULL, NULL, NULL),
(3, 1, '2013-12-16', 'Some shit went down.', '2013-12-16', NULL, NULL, NULL, NULL, NULL),
(4, 1, '2013-12-16', 'This should have happened on Dec 1.', '2013-12-01', NULL, NULL, NULL, NULL, NULL),
(5, 1, '2013-12-16', 'Going to lunch now.', '2013-12-16', NULL, NULL, NULL, NULL, NULL),
(6, 1, '2014-01-06', 'I want to pop some tags. I got $20 in my pocket.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(7, 1, '2014-01-06', 'I want to pop some tags. I got $20 in my pocket.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(8, 4, '2014-01-06', 'I ate it.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(9, 5, '2014-01-06', 'Got ran over by my truck.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(10, 6, '2014-01-06', 'Got ran over by my truck.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(11, 7, '2014-01-06', 'Got ran over by my truck.', '2014-01-06', NULL, NULL, NULL, NULL, NULL),
(12, 8, '2014-01-06', 'Blew up', '2014-01-06', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'UserCake'),
(2, 'website_url', 'localhost/batfadb/'),
(3, 'email', 'noreply@aved.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css');

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'left-nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(15, 'register.php', 0),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1),
(18, 'bat_zoll_1017.php', 0),
(19, 'batfadb.php', 0),
(20, 'mainmenu.php', 0),
(21, 'testpage.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'New Member'),
(2, 'Administrator'),
(3, 'Viewer'),
(4, 'Production'),
(5, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, 'astring', 'Andrew String', '99e7c3fa9d9635690f774e5e3ded2a3c785f19b9a02bc34a5d3c96bba8b7841c3', 'astring@aved.com', 'bfd72a97f9ee0cb85b563b4de9330053', 1385569192, 0, 1, 'Engineering Manager', 1385569192, 1389192599),
(2, 'juser', 'Joe User', '8a7f262d854c917d5037a5bc4cc23a15efacc7e004689a647290986c7ddf37df9', 'test@test.com', '2ddd7433ffd1da06b2c5c2e5f126c8f7', 1385578688, 0, 1, 'New Member', 1385578688, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1),
(4, 1, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
